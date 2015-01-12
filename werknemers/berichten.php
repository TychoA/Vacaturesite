<html>
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include '../includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_account; ?>">Mijn Account</a>
                <span class="dash">/</span>
                <a href="<?php echo $berichten; ?>">Mijn Berichten</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper  beheer">  
        <?php include '../includes/sidebar_werknemers.php';?>
            
        <main>
            <h1>Mijn Berichten</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
            </p>
                
            <div class="full">
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="vac_mini_info">Afzener | Tijd en datum</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div>   
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="vac_mini_info">Afzener | Tijd en datum</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div> 
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="vac_mini_info">Afzener | Tijd en datum</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div>   
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="vac_mini_info">Afzener | Tijd en datum</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div> 
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope fa-fw"></i> Titel bericht</h4>
                    <p class="vac_mini_info">Afzener | Tijd en datum</p>
                    <p class="ber_mini_beschr">Lorem ipsum dolor,</p>
                    <p class="ber_mini_beschr">Sit amet, consectetur adipiscing elit. Aenean nec aliquam sapien. Cras posuere sagittis est at porttitor. Nam lobortis, est a dignissim tempus, enim tellus aliquet justo, id aliquam mi nulla vitae urna.</p>
                    <p class="ber_mini_beschr">Pellentesque euismod enim non massa finibus lacinia. Mauris non malesuada neque, condimentum...</p>
                </div> 
                <div class="ber_mini">
                    <h4><i class="fa fa-envelope-o fa-fw"></i> Titel bericht</h4>
                    <p class="vac_mini_info">Afzener | Tijd en datum</p>
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