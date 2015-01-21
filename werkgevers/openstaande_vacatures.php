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
                <a href="<?php echo $openstaande_vacatures; ?>">Openstaande vacatures</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werkgevers.php';?>
            
        <main>
            <h1>Openstaande vacatures</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
            </p>
                
            <div class="full">
                <?php 
            
                $stmt = $db->prepare("SELECT ID, duur, locatie, datum, titel, beschrijving_aanbod FROM vacatures WHERE ID_werkgevers = 1 ORDER BY datum DESC");
                $stmt->execute();
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $res_timestamp = strtotime($row['datum']);
                        $datum = date("d/m/y H:i",$res_timestamp);

                        $res_beschr = mb_substr($row["beschrijving_aanbod"], 0, 140);  

                        echo    "<div class='vac_mini'>";
                        echo        "<a href='#'><i class='fa fa-close fa-lg delete'></i></a>";
                        echo        "<a href=".$detail_vacature."?id=".$row["ID_vacatures"].">";
                        echo            "<h4>".$row["titel"]."</h4>";
                        echo            "<p class='vac_mini_info'>".$row["duur"]." | ".$row["locatie"]." | ".$datum."</p>";
                        echo            "<p class='vac_mini_beschr'>".$res_beschr."...</p>";
                        echo        "</a>";
                        echo    "</div>";   
                        
                        
                    }
                } else {
                    echo "<p class='info'>U heeft momenteel geen openstaande vacatures! Klik links in het menu op 'Vacature toevoegen'.</p>";
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