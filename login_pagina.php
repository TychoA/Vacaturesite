<?php
session_start();
ob_start();

$login = "";
$valid = false;
$password = ""; $dbuser = ""; $dbpass = "";

try {
     include('./includes/connect.php');
    
    $sql = $db->prepare("SELECT werkgevers.id, werkgevers.email, werkgevers.wachtwoord, werkgevers.soort FROM werkgevers LEFT JOIN werknemers ON (werkgevers.email = werknemers.email AND werkgevers.wachtwoord = werknemers.wachtwoord AND werkgevers.soort = werknemers.soort AND werkgevers.id = werknemers.id) UNION SELECT werknemers.id, werknemers.email, werknemers.wachtwoord, werknemers.soort FROM werknemers LEFT JOIN werkgevers ON (werknemers.email = werkgevers.email AND werknemers.wachtwoord = werkgevers.wachtwoord AND werknemers.soort = werkgevers.soort AND werknemers.id = werkgevers.id)");
    $sql->execute();
        
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) 
    {
        $dbuser = $row['email'];
        $dbpass = $row['wachtwoord'];
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            if ($dbuser === trim($_POST['gebruikersnaam']) && password_verify(trim($_POST['wachtwoord']), $dbpass) === true) {
                session_destroy(); // voor de zekerheid
                session_start();
                if ($row['soort'] == "werknemer") {
                    $werknemer = true;
                    $_SESSION['werknemerid'] = $row['id'];  
                } else {
                    $werkgever = true;
                    $_SESSION['werkgeverid'] = $row['id'];
                }
                $valid = true;
            }
        }
    }   
    if ($valid) {
        $_SESSION['valid'] = true;
        header ( 'Location:index.php');
    }
} 
catch(PDOException $ex) {
    echo $ex . "error";
}
?>

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
            <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <label for="gebruikersnaam">E-mail</label>
                <input class="input_gebruikersnaam" type="email" name="gebruikersnaam" placeholder="E-mail" maxlength="50" required>

                <label for="wachtwoord">Wachtwoord</label>
                <input class="input_wachtwoord" type="password" name="wachtwoord" placeholder="Wachtwoord" maxlength="50" required>
                
                <input type="submit" class="login_button" value="Login" name="submit">
                <?php if (isset($_POST['submit'], $_POST['gebruikersnaam']) && $valid == false) { echo "<script>alert('Deze inloggegevens zijn incorrect!')</script>";} ?>
            </form>    
        </div>
    </div>
</main>
<!-- /MAIN AREA -->

 <!-- FOOTER AREA -->
    <?php include './includes/footer.php';?>
<!-- /FOOTER AREA -->
</html>
