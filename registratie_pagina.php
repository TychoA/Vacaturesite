<!DOCTYPE html>
<html>    
    <?php include './linking.php'; ?>
    <link rel="stylesheet" href="registratie.css">
    
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
            <h2>Registratie</h2>            
                <div class="gebruikersnaam">
                    <form method="post" action="registratie.php">
                        
                    <!-- NAAM -->
                    <label for="voornaam">Voornaam</label>
                    <input class="input_voornaam" type="text" name="voornaam" placeholder="Voornaam" />
                        
                    <!-- ACHTERNAAM -->
                    <label for="achternaam">Achternaam</label>
                    <input class="input_achternaam" type="text" name="achternaam" placeholder="Achterrnaam" />
                        
                    <!-- PLAATSNAAM -->
                    <label for="plaatsnaam">Plaatsnaam</label>
                    <input class="input_plaatsnaam" type="text" name="plaatsnaam" placeholder="Plaatsnaam" />
                    
                    <!-- EMAIL -->
                    <label for="gebruikersnaam">E-mail</label>
                    <input class="input_gebruikersnaam" type="email" name="gebruikersnaam" placeholder="E-mail" />
                        
                    <!-- TELEFOON -->
                    <label for="telefoon">Telefoon</label>
                    <input class="input_telefoon" type="tel" name="telefoon" placeholder="Telefoonnummer" />
                    
                    <!-- WACHTWOORD -->
                    <label for="wachtwoord">Wachtwoord</label>
                    <input class="input_wachtwoord" type="password" name="wachtwoord" placeholder="Wachtwoord" />
                    
                    <input type="submit" class="login_button" value="Registreer"></button>
                    </form>
                </div>
        </div>
    </main>
    <!-- /MAIN AREA -->

     <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
</html>
</html>