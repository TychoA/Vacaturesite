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
                <a href="<?php echo $archief_vacatures; ?>">Archief vacatures</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werkgevers.php';?>
            
        <main>
            <h1>Archief vacatures</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    &#171; Terug naar overzicht
                </a>
            </p>
                
            <div class="full">
                <div class="vac_mini">
                    <h4>Titel vacature [gesloten]</h4>
                    <p class="vac_mini_info">Gesloten op 01-01-2015</p>
                    <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                </div> 
                <div class="vac_mini">
                    <h4>Titel vacature  [gesloten]</h4>
                    <p class="vac_mini_info">Gesloten op 01-01-2015</p>
                    <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                </div>
                <div class="vac_mini">
                    <h4>Titel vacature  [gesloten]</h4>
                    <p class="vac_mini_info">Gesloten op 01-01-2015</p>
                    <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
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