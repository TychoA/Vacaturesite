<?php
session_start();
ob_start();

$valid = false;
$loginErr = $wachtwoordErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    if (empty($_POST['gebruikersnaam'])) {
        $loginErr = "E-mail of wachtwoord is incorrect";
        $valid = false;
    }
    if (empty($_POST['wachtwoord'])) {
        $wachtwoordErr = "Wachtwoord ontbreekt";
        $valid = false;
    }
}
try {
    $db = new PDO('mysql:host=localhost; dbname=stagepeer', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    $sql = $db->prepare("SELECT email, wachtwoord FROM werknemers");
    $sql->execute();
    
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($row['email'] === $_POST['gebruikersnaam'] && $row['wachtwoord'] === $_POST['wachtwoord']) {
            $valid = true;
            }
        }
    }   
    if ($valid) {
        echo "Login succes";
        //header ( 'Location:index.php');
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
                
                <input type="submit" class="login_button" value="Login">
            </form>    
        </div>
    </div>
</main>
<!-- /MAIN AREA -->

 <!-- FOOTER AREA -->
    <?php include './includes/footer.php';?>
<!-- /FOOTER AREA -->
</html>