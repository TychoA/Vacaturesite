<?php
$valid = false;
$werkgever = false;
$werknemer = false;
$replica = false;

// Variabelen voor werkgevers
if (isset($_POST['bedrijf'], $_POST['plaatsnaam'], $_POST['gebruikersnaam'], $_POST['telefoon'], $_POST['wachtwoord']))
{
    $params = array(":naam"=>$_POST['bedrijf'],
                    ":plaatsnaam"=>$_POST['plaatsnaam'],
                    ":email"=>$_POST['gebruikersnaam'],
                    ":telefoon"=>$_POST['telefoon'],
                    ":wachtwoord"=>$_POST['wachtwoord']);
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
                $werknemer = true;

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


        // Checken of dit email adres al is gebruikt
        $check = $db->prepare("SELECT werknemers.email FROM werknemers LEFT JOIN werkgevers ON werknemers.email = werkgevers.email UNION SELECT werkgevers.email FROM werkgevers LEFT JOIN werknemers ON werkgevers.email = werknemers.email");
        $check->execute();
        $result = $check->fetchAll(PDO::FETCH_ASSOC);
        print_r($result);
        foreach ($result as $email) {
            if ($email['email'] == $_POST['gebruikersnaam']) {
                $replica = true;
            }
        }

        // Invoegen in de werknemer database
        if ($valid == true && $werknemer == true && $replica == false) {
            $sql = $db->prepare("INSERT INTO werknemers (naam, achternaam, wachtwoord, telefoonnummer, plaatsnaam, email) VALUES(:naam, :achternaam, :wachtwoord, :telefoon, :plaatsnaam, :email)");
            $sql->execute($params);


        } elseif($valid == true && $werkgever == true && $replica == false) {
        // Invoegen in de werkgever database
            $sql = $db->prepare("INSERT INTO werkgevers (naam, wachtwoord, telefoonnummer, plaatsnaam, email) VALUES(:naam, :wachtwoord, :telefoon, :plaatsnaam, :email)");
            $sql->execute($params); 
        }   
    }   
    catch(PDOException $ex) {
        echo $ex . "Error";
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
                    <?php if ($replica == true) { echo "<script>alert('Dit email adres bestaat al!')</script>"; echo "<script>window.location = 'registratie_pagina.php?link=1'</script>"; } elseif($valid) { echo "<script>alert('Je bent succesvol registreerd!')</script>"; echo "<script>window.location = 'login_pagina.php'</script>"; } ?>
                </form>
                </div>
        </div>
    </main>
    <!-- /MAIN AREA -->

     <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
</html>