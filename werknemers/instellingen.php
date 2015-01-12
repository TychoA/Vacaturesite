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
                <a href="<?php echo $instellingen; ?>">Wachtwoord aanpassen</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werknemers.php';?>
            
        <main>
            <h1>Wachtwoord aanpassen</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
            </p>
                
            <div class="full edit_password">
            	<h4>Oud wachtwoord</h4><input type="text" name="old_password" placeholder="..." />
            	<h4>Nieuw wachtwoord</h4><input type="text" name="new_password" placeholder="..." />
            	<h4>Herhaal nieuw wachtwoord</h4><input type="text" name="new_password_again" placeholder="..." />
            	<input id="submit" type="submit" name="submit" value="Opslaan"
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>