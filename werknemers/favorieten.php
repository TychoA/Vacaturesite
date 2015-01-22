<?php session_start(); 

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
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
                <span class="dash">/</span>
                <a href="<?php echo $favorieten; ?>">Mijn Favorieten</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werknemers.php';?>
            
        <main>
            <h1>Mijn Favorieten</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
            </p>
                
            <div class="full"> 
                
                <?php 
                $stmt = $db->prepare("SELECT ID_werknemers, ID_vacatures, werknemers.ID, vacatures.ID, vacatures.ID_werkgevers, werkgevers.ID, werkgevers.naam, locatie, datum, titel, beschrijving_aanbod FROM favorieten INNER JOIN werknemers ON ID_werknemers = werknemers.ID INNER JOIN vacatures ON ID_vacatures = vacatures.ID INNER JOIN werkgevers ON vacatures.ID_werkgevers = werkgevers.ID WHERE werknemers.ID =".$userID);
                $stmt->execute();
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $res_timestamp = strtotime($row['datum']);
                        $datum = date("d/m/y",$res_timestamp);
                        $tijd = date("H:i",$res_timestamp);

                        $res_beschr = mb_substr($row["beschrijving_aanbod"], 0, 300);

                        echo "<a href=".$detail_vacature."?id=".$row["ID_vacatures"].">";
                        echo    "<div class='vac_mini'>";
                        echo        "<h4><i class='fa fa-heart fa-fw'></i> ".$row["titel"]."</h4>";
                        echo        "<p class='vac_mini_info'>".$row["naam"]." | ".$row["locatie"]." | Geplaatst op ".$datum." om ".$tijd."</p>";
                        echo        "<p class='vac_mini_beschr'>".$res_beschr."...</p>";
                        echo    "</div>";        
                        echo "</a>";    

                    }
                } else {
                    echo "<p class='info'>Je hebt nog geen vacature als favoriet opgeslagen!</p>";
                }?>
                
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
</body>
    
</html>