<?php

session_start();
ob_start();

$login = "";
$valid = false;

try 
{
    $db = new PDO('mysql:host=localhost; dbname=stagepeer', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    $sql = $db->prepare("SELECT werkgevers.email, werkgevers.wachtwoord, werkgevers.soort FROM werkgevers LEFT JOIN werknemers ON (werkgevers.email = werknemers.email AND werkgevers.wachtwoord = werknemers.wachtwoord AND werkgevers.soort = werknemers.soort) UNION SELECT werknemers.email, werknemers.wachtwoord, werknemers.soort FROM werknemers LEFT JOIN werkgevers ON (werknemers.email = werkgevers.email AND werknemers.wachtwoord = werkgevers.wachtwoord AND werknemers.soort = werkgevers.soort)");
    $sql->execute();
        
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            if ($row['email'] === trim($_POST['gebruikersnaam']) && $row['wachtwoord'] === trim($_POST['wachtwoord'])) 
            {
                if ($row['soort'] == "werknemer")
                {
                    echo "Werknemer" . "<br>";
                } else
                {
                    echo "Werkgever" . "<br>";
                }
                echo "Gegevens kloppen" . "<br>";
            }
            else
            {
                echo "Gegevens kloppen niet" . "<br>";
            }
        }
    print_r($row);
    print "<br>" . "<br>";
    }   
} 
catch(PDOException $ex) 
{
    echo $ex . "error";
}

?>

<!DOCTYPE html>
<html>
    <head></head>
    
    <body>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="gebruikersnaam">E-mail</label>
            <input class="input_gebruikersnaam" type="email" name="gebruikersnaam" placeholder="E-mail" maxlength="50" required>

            <label for="wachtwoord">Wachtwoord</label>
            <input class="input_wachtwoord" type="password" name="wachtwoord" placeholder="Wachtwoord" maxlength="50" required>

            <input type="submit" class="login_button" value="Login" name="submit">
        </form>
    </body>
</html>