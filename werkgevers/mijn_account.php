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
            
                $stmt = $db->prepare("SELECT ID, duur, locatie, datum, titel, beschrijving_aanbod FROM vacatures WHERE ID_werkgevers = 1 ORDER BY datum DESC LIMIT 3");
                $stmt->execute();
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
                
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="ber_mini_info">Naam afzender | 13:25 12/01/'15</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div>
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="ber_mini_info">Naam afzender | 13:25 12/01/'15</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div>
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="ber_mini_info">Naam afzender | 13:25 12/01/'15</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div>
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="ber_mini_info">Naam afzender | 13:25 12/01/'15</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div>
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="ber_mini_info">Naam afzender | 13:25 12/01/'15</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div>
                          
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>