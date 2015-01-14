<!DOCTYPE html>
<html>    
    <?php include './linking.php'; ?>
    <link rel="stylesheet" href="login.css">
    
    <!-- HEADER AREA -->
    <?php include './includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->

    <!-- MAIN AREA -->
    <main>
        <div class="wrapper">
            <h2>Login</h2>            
                <div class="gebruikersnaam">
                    <form method="post" action="login.php">
                    <label for="gebruikersnaam">E-mail</label>
                    <input class="input_gebruikersnaam" type="text" name="gebruikersnaam" placeholder="E-mail" maxlength="50" />
                    
                    <label for="wachtwoord">Wachtwoord</label>
                    <input class="input_wachtwoord" type="password" name="wachtwoord" placeholder="Wachtwoord" maxlength="50"/>
                    <input type="submit" class="login_button" value="Login"></button>
                    </form>
                </div>
        </div>
    </main>
    <!-- /MAIN AREA -->

     <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
</html>