<?php
$valid = false; $werkgever = false; $werknemer = false; $replica = false;

// Variabelen voor werkgevers
if (isset($_POST['bedrijf'], $_POST['locatie'], $_POST['gebruikersnaam'], $_POST['telefoon'], $_POST['wachtwoord']))
{   
    $params = array(":naam"=>$_POST['bedrijf'],
                    ":locatie"=>$_POST['locatie'],
                    ":email"=>$_POST['gebruikersnaam'],
                    ":telefoon"=>$_POST['telefoon'],
                    ":wachtwoord"=>$_POST['wachtwoord'],
                   ":soort"=>"werkgever");
                    $werkgever = true;
} 
// Variabelen voor werknemers
elseif (isset($_POST['voornaam'], $_POST['achternaam'], $_POST['locatie'], $_POST['gebruikersnaam'], $_POST['telefoon'], $_POST['wachtwoord']))
{
        
    $params = array(":naam"=>$_POST['voornaam'], 
                ":achternaam"=>$_POST['achternaam'], 
                ":locatie"=>$_POST['locatie'], 
                ":email"=>$_POST['gebruikersnaam'], 
                ":telefoon"=>$_POST['telefoon'], 
                ":wachtwoord"=>$_POST['wachtwoord'],
                   ":soort"=>"werknemer");
                $werknemer = true;

}
if (!empty($params)) {
    try 
    {
        include('./includes/connect.php');  
        
        foreach ($params as $par) {
            if (!empty($par)) {
                $valid = true;
            }
        }


        // Checken of dit email adres al is gebruikt
        $check = $db->prepare("SELECT werknemers.email FROM werknemers LEFT JOIN werkgevers ON werknemers.email = werkgevers.email UNION SELECT werkgevers.email FROM werkgevers LEFT JOIN werknemers ON werkgevers.email = werknemers.email");
        $check->execute();
        $result = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $email) {
            if ($email['email'] == $_POST['gebruikersnaam']) {
                $replica = true;
            }
        }

        // Invoegen in de werknemer database
        if ($valid == true && $werknemer == true && $replica == false) {
            $sql = $db->prepare("INSERT INTO werknemers (naam, achternaam, wachtwoord, telefoonnummer, locatie, email, soort) VALUES(:naam, :achternaam, :wachtwoord, :telefoon, :locatie, :email, :soort)");
            $sql->execute($params);


        } elseif($valid == true && $werkgever == true && $replica == false) {
        // Invoegen in de werkgever database
            $sql = $db->prepare("INSERT INTO werkgevers (naam, wachtwoord, telefoonnummer, locatie, email, soort) VALUES(:naam, :wachtwoord, :telefoon, :locatie, :email, :soort)");
            $sql->execute($params); 
        }   
    }   
    catch(PDOException $ex) {
        echo $ex . "Error";
    }  
}
?>

    <!-- HEADER AREA -->  
    <?php include './linking.php'; ?>
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
        <div class="wrapper registratie">
            <h2 class="header-login">Registratie</h2>
                <div class="gebruikersnaam">
                    <a class="soort" href="?link=1" name="Werknemer" id="werknemer">Werknemer</a> 
                    <a class="soort" href="?link=2" name="Werkgever" id="werkgever">Werkgever</a>                        
                    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                      
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