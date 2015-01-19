<?php
$valid = false;
$werkgever = "false";
$werknemer = "false";

// Variabelen voor werkgevers
if (isset($_POST['bedrijf'], $_POST['plaatsnaam'], $_POST['gebruikersnaam'], $_POST['telefoon'], $_POST['wachtwoord']))
{
    $params = array(":naam"=>$_POST['bedrijf'],
                    ":plaatsnaam"=>$_POST['plaatsnaam'],
                    ":email"=>$_POST['gebruikersnaam'],
                    ":telefoon"=>$_POST['telefoon'],
                    ":wachtwoord"=>$_POST['wachtwoord']);
                   
                    foreach($params as $par) { echo $par . "<br>";}
                    echo "<br>" . "werkgever";
                    $werkgever = true;
} 

// Variabelen voor werknemers
elseif (isset($_POST['voornaam'], $_POST['achternaam'], $_POST['plaatsnaam'], $_POST['gebruikersnaam'], $_POST['telefoon'], $_POST['wachtwoord']))
{
    $params = array(":naam"=>$_POST['voornaam'], 
                ":achternaam"=>$_POST['achternaam'], 
                ":plaatsnaam"=>$_POST['plaatsnaam'], 
                ":email"=>$_POST['gebruikersnaam'], 
                ":telefoon"=>$_POST['telefoon'], 
                ":wachtwoord"=>$_POST['wachtwoord']);
                
                foreach($params as $par) {echo $par . "<br>";};
                echo "<br>" . "werknemer";
                $werkgever = true;

}
    if (!empty($params)) {
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
        // Invoegen in de werknemer database
        if ($valid && $werknemer == true) {
            $sql = $db->prepare("INSERT INTO werknemers (naam, achternaam, wachtwoord, telefoonnummer, plaatsnaam, email) VALUES(:naam, :achternaam, :wachtwoord, :telefoon, :plaatsnaam, :email)");
            $sql->execute($params);
            
            
        } elseif($valid && $werkgever == true) {
        // Invoegen in de werkgever database
             $sql = $db->prepare("INSERT INTO werkgevers (naam, wachtwoord, telefoonnummer, plaatsnaam, email) VALUES(:naam, :wachtwoord, :telefoon, :plaatsnaam, :email)");
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
                    
                    <!-- TEST -->    
                    <a href="?link=1" name="Werknemer" id="werknemer">Werknemer</a> 
                    <a href="?link=2" name="Werkgever" id="werkgever">Werkgever</a>
                        
                    <?php 
                        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                            $link = $_GET['link'];
                            if ($link == '1') {
                                include('werknemer.php');
                                $werknemer = true;
                            } 
                            if ($link == '2') {
                                include('werkgever.php');
                                $werkgever = true;
                            }
                        }
                     ?>
                                                
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