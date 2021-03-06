<?php session_start();

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
} else {
    header ( 'Location:../login_pagina.php');
}

?>
    <!-- HEADER AREA -->
    <?php include '../includes/connect.php';?>
    <?php include './linking.php';?>
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
        <?php include '../includes/sidebar_werknemers.php';?>
            
        <main>
            <div class="blok_search full">
                <h2>Zoeken naar vacatures</h2>
                
                <form action="<?php echo $zoekresultaten.'#searchbar'; ?>" method="post">
                    <input class="search" name="zoekveld" type="text" placeholder="Typ hier uw zoekwoorden..">
                
                    <p class="omgeving">Omgeving: </p>
                    <select class="filters" name="omgeving">
                        <option value="alles">Selecteer...</option>
                        <option value="Noord-Holland">Noord-Holland</option>
                        <option value="Zuid-Holland">Zuid-Holland</option>
                        <option value="Utrecht">Utrecht</option>
                        <option value="Flevoland">Flevoland</option>
                        <option value="Gelderland">Gelderland</option>
                        <option value="Overijssel">Overijssel</option>
                        <option value="Noord-Brabant">Noord-Brabant</option>
                        <option value="Groningen">Groningen</option>
                        <option value="Drenthe">Drenthe</option>
                        <option value="Friesland">Friesland</option>
                        <option value="Limburg">Limburg</option>
                        <option value="Zeeland">Zeeland</option>
                        <option value="Internationaal">Internationaal</option>
                    </select>
                
                    <p class="periode">Periode: </p>
                    <select class="filters" name="duur">
                        <option value="alles">Selecteer...</option>
                        <option value="6 maanden">6 maanden</option>
                        <option value="1 jaar">1 jaar</option>
                        <option value="2 jaar">2 jaar</option>
                        <option value="Anders">Anders</option>
                    </select>
                
                    <p class="studie">Studie: </p>
                    <select class="filters" name="opleiding">
                        <option value="alles">Selecteer...</option>
                        <option value="Informatica">WO - Informatica</option>
                        <option value="Informatiekunde">WO - Informatiekunde</option>
                        <option value="Informatie Multimedia Management">WO - Informatie, Multimedia, Management</option>
                        <option value="Medische Informatiekunde">WO - Medische Informatiekunde</option>
                        <option value="Kunstmatige Intelligentie">WO - Kunstmatige Intelligentie</option>
                        <option value="Anders">Anders</option>
                    </select>

                
                <input id="submit" name="zoeken" type="submit" value="Zoeken">
            </form>
            </div>
                
            <div class="blok_left">
                <h2>Jouw Matches</h2>
            
                <?php 
                $stmt = $db->prepare("SELECT locatie, studierichting FROM werknemers WHERE id=:id");
                $stmt->execute(array(':id' => $userID));

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                    $locatie = $row['locatie'];
                    $studierichting = $row['studierichting'];
                }

                $stmt = $db->prepare("SELECT vacatures.ID, titel, datum, werkgevers.naam, vacatures.locatie, beschrijving_aanbod FROM vacatures INNER JOIN werkgevers ON ID_werkgevers = werkgevers.ID WHERE vacatures.locatie=:locatie AND opleidingen LIKE :studie LIMIT 3");
                $stmt->execute(array(':locatie' => $locatie, ':studie' => "%$studierichting%"));
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $res_timestamp = strtotime($row['datum']);
                        $datum = date("d/m/y H:i",$res_timestamp);

                        $res_beschr = mb_substr($row["beschrijving_aanbod"], 0, 140);

                        echo "<a href=".$detail_vacature."?id=".$row["ID"].">";
                        echo    "<div class='vac_mini'>";
                        echo        "<h4>".$row["titel"]."</h4>";
                        echo        "<p class='vac_mini_info'>".$row["naam"]." | ".$row["locatie"]." | ".$datum."</p>";
                        echo        "<p class='vac_mini_beschr'>".$res_beschr."...</p>";
                        echo    "</div>";        
                        echo "</a>";    

                    }
                } else {
                    echo "<p class='info'>Er zijn momenteel geen matches voor je gevonden!</p>";
                }?>     
            </div>
                
            <div class="blok_right">
                <h2>Favorieten</h2>
                
                <?php 
            
                $stmt = $db->prepare("SELECT ID_werknemers, ID_vacatures, werknemers.ID, vacatures.ID, vacatures.ID_werkgevers, werkgevers.ID, werkgevers.naam, vacatures.locatie, datum, titel, beschrijving_aanbod FROM favorieten INNER JOIN werknemers ON ID_werknemers = werknemers.ID INNER JOIN vacatures ON ID_vacatures = vacatures.ID INNER JOIN werkgevers ON vacatures.ID_werkgevers = werkgevers.ID WHERE werknemers.ID=:id LIMIT 3");
                $stmt->execute(array(':id' => $userID));
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $res_timestamp = strtotime($row['datum']);
                        $datum = date("d/m/y H:i",$res_timestamp);

                        $res_beschr = mb_substr($row["beschrijving_aanbod"], 0, 140);

                        echo "<a href=".$detail_vacature."?id=".$row["ID_vacatures"].">";
                        echo    "<div class='vac_mini'>";
                        echo        "<h4>".$row["titel"]."</h4>";
                        echo        "<p class='vac_mini_info'>".$row["naam"]." | ".$row["locatie"]." | ".$datum."</p>";
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