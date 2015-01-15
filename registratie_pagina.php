<?php
$valid = true;
$voornaamErr = $achternaamErr = $plaatsnaamErr = $gebruikerErr = $telefoonErr = $passwordErr = "";

if (isset($_POST['voornaam'], $_POST['achternaam'], $_POST['plaatsnaam'], $_POST['gebruikersnaam'], $_POST['telefoon'], $_POST['wachtwoord']))
{
$params = array(":naam"=>$_POST['voornaam'], 
                ":achternaam"=>$_POST['achternaam'], 
                ":plaatsnaam"=>$_POST['plaatsnaam'], 
                ":email"=>$_POST['gebruikersnaam'], 
                ":telefoon"=>$_POST['telefoon'], 
                ":wachtwoord"=>$_POST['wachtwoord']);
    try 
    {
        $db = new PDO('mysql:host=localhost; dbname=stagepeer', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['voornaam'])) {
                $voornaamErr = "Voornaam ontbreekt";
                $valid = false;
            }
            if (empty($_POST['achternaam'])) {
                $achternaamErr = "Achternaam ontbreekt";
                $valid = false;
            }
            if (empty($_POST['plaatsnaam'])) {
                $plaatsnaamErr = "Plaatsnaam ontbreekt";
                $valid = false;
            }
            if (empty($_POST['gebruikersnaam'])) {
                $gebruikerErr = "E-mail ontbreekt";
                $valid = false;
            }
            if (empty($_POST['telefoon'])) {
                $telefoonErr = "Telefoonnummer ontbreekt";
                $valid = false;
            }
            if (empty($_POST['wachtwoord'])) {
                $passwordErr = "Wachtwoord ontbreekt";
                $valid = false;
            }          
            } 
        
        
        if ($valid) {
        $sql = $db->prepare("INSERT INTO werknemers (naam, achternaam, wachtwoord, telefoonnummer, plaatsnaam, email) VALUES(:naam, :achternaam, :wachtwoord, :telefoon, :plaatsnaam, :email)");
        $sql->execute($params);
        } 

    }   
    catch(PDOException $ex) {
        echo $ex . "error";
    }  
}
?>

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
                <div class="error_div">
                    <span class="error"> * <?php echo $voornaamErr; ?></span>
                    <span class="error"> * <?php echo $achternaamErr; ?></span>
                    <span class="error"> * <?php echo $plaatsnaamErr; ?></span>
                    <span class="error"> * <?php echo $gebruikerErr; ?></span>
                    <span class="error"> * <?php echo $telefoonErr; ?></span>
                    <span class="error"> * <?php echo $passwordErr; ?></span> 
                </div>
            
                <div class="gebruikersnaam">
                    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                        
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
                    
                    <input type="submit" class="login_button" value="Registreer" </input>
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