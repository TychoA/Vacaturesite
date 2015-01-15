<?php
$valid = false;
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
        
        foreach ($params as $par) {
            if (!empty($par)) {
                $valid = true;
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
                <div class="gebruikersnaam">
                    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                    <!-- NAAM -->
                    <label for="voornaam">Voornaam</label>
                    <input class="input_voornaam" type="text" name="voornaam" placeholder="Voornaam" pattern="^[a-zA-Z][a-zA-Z-_\.]{1,20}$" required>
                        
                    <!-- ACHTERNAAM -->
                    <label for="achternaam">Achternaam</label>
                    <input class="input_achternaam" type="text" name="achternaam" placeholder="Achternaam" pattern="^[a-zA-Z][a-zA-Z-_\.]{1,30}$" required>
                        
                    <!-- PLAATSNAAM -->
                    <label for="plaatsnaam">Plaatsnaam</label>
                    <input class="input_plaatsnaam" type="text" name="plaatsnaam" placeholder="Plaatsnaam" pattern="^[a-zA-Z][a-zA-Z-_\.]{1,30}$" required>
                    
                    <!-- EMAIL -->
                    <label for="gebruikersnaam">E-mail</label>
                    <input class="input_gebruikersnaam" type="email" name="gebruikersnaam" placeholder="E-mail" required>
                        
                    <!-- TELEFOON -->
                    <label for="telefoon">Telefoon</label>
                    <input class="input_telefoon" type="text" name="telefoon" placeholder="Telefoonnummer" pattern="^[0-9]{10}" maxlength="10" required>
                    
                    <!-- WACHTWOORD -->
                    <label for="wachtwoord">Wachtwoord</label>
                    <input class="input_wachtwoord" type="password" name="wachtwoord" placeholder="Wachtwoord" required>
                    
                    <input type="submit" class="login_button" value="Registreer" </input>
                        
                    <?php if($valid) { echo "<script>alert('Je bent succesvol registreerd!')</script>"; echo "<script>window.location = 'login_pagina.php'</script>"; } ?>

                    </form>
                </div>
        </div>
    </main>
    <!-- /MAIN AREA -->

     <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
</html>