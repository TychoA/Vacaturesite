<?php session_start();

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid']))) {
    $bedrijfID = $_SESSION['werkgeverid'];
} else {
    header ( 'Location:../login_pagina.php');
}

?>
<html>
    <?php include '../includes/connect.php';?>
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include '../includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_account; ?>">Mijn Account</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werkgevers.php';?>
            
        <main>
            <div class="blok_search full">
                <h2>Recent toegevoegde vacatures</h2>
                
                <?php 
            
                $stmt = $db->prepare("SELECT ID, duur, locatie, datum, titel, beschrijving_aanbod FROM vacatures WHERE ID_werkgevers =:idwerkgevers ORDER BY datum DESC LIMIT 3");
                $stmt->execute(array(':idwerkgevers' => $bedrijfID));
                $row_count = $stmt->rowCount();
                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $res_timestamp = strtotime($row['datum']);
                        $datum = date("d/m/y H:i",$res_timestamp);
                        $res_beschr = mb_substr($row["beschrijving_aanbod"], 0, 140);
                        echo "<a href=".$detail_vacature."?id=".$row["ID"].">";
                        echo    "<div class='vac_mini'>";
                        echo        "<h4>".$row["titel"]."</h4>";
                        echo        "<p class='vac_mini_info'>".$row["duur"]." | ".$row["locatie"]." | ".$datum."</p>";
                        echo        "<p class='vac_mini_beschr'>".$res_beschr."...</p>";
                        echo    "</div>";        
                        echo "</a>";    
                    }
                } else {
                    echo "<p class='info'>U heeft momenteel geen openstaande vacatures! Klik links in het menu op 'Vacature toevoegen'.</p>";
                }?>
            </div>
                
            <div class="full">
                <h2>Ongelezen berichten</h2>
                
                           
<?php  
    $array_ber = []; //alle bericht-gegevens + naam werkgever

    //SQL-query om alle berichten en werkgevers-naam op te vragen in phpmyadmin
    $sql = "SELECT verstuurd_werknemer.titel, verstuurd_werknemer.datum, verstuurd_werknemer.bericht, verstuurd_werknemer.gelezen, verstuurd_werknemer.ID, werknemers.naam, werknemers.id, ID_vacature
            FROM verstuurd_werknemer
            INNER JOIN werknemers
            ON werknemers.ID = verstuurd_werknemer.ID_werknemer AND verstuurd_werknemer.ID_werkgever=".$bedrijfID."
            WHERE gelezen = 0
            ORDER BY verstuurd_werknemer.datum DESC
            ";

    $results = $db->query($sql);

    foreach($results as $row) 
    { 
        $titel = $row['titel'];
        $werknemer = $row['naam'];
        $datum = $row['datum'];
        $bericht = $row['bericht'];
        $gelezen = $row['gelezen'];
        $berichtID = $row['ID'];
        $werknemers_ID = $row['id'];
        $vacature_ID = $row['ID_vacature'];
        $temp_array = [$titel, $werknemer, $datum, $bericht, $gelezen, $berichtID, $werknemers_ID, $vacature_ID];
        //Push alle gevonden berichtgegevens in de array
        array_push($array_ber, $temp_array);
    }

    if (sizeof($array_ber) == 0) {
        echo '<i>U heeft geen ongelezen berichten.</i>';
    }

    for ($i=0; $i < sizeof($array_ber); $i++) {
        $titel = $array_ber[$i][0];
        $werknemer = $array_ber[$i][1];
        $datum = $array_ber[$i][2];
        $bericht = $array_ber[$i][3];
        
        echo '<div class="ber_mini">
        <a href="berichten.php"><h4><i class="fa fa-envelope fa-fw unread"></i> '.$titel.'</h4></a>
        <p class="vac_mini_info">'.$werknemer.' | '.$datum.'</p>
        <p class="ber_mini_beschr">'.substr($bericht, 0, 280).'...</p>
        </div>'; // Je kunt alleen de eerste 280 tekens van het bericht zien
        
    }
?>
                          
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>