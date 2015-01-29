<?php 
    session_start();
    // Check of je ingelogd bent
    if (isset($_SESSION['valid'])){
        header ( 'Location:./index.php');
    }
?>


    <!-- HEADER AREA -->
    <?php include './linking.php'; ?>
    <?php include './includes/header.php';
    
    if (isset($_POST['submit'])) {
        $email = trim(strip_tags($_POST['gebruikersnaam']));
        $wachtwoord;
        function checkEmail() {
            global $wachtwoord;
            $email = trim(strip_tags($_POST['gebruikersnaam']));
            
            include './includes/connect.php';
            $sql = $db->prepare("SELECT werkgevers.id, werkgevers.email, werkgevers.wachtwoord, werkgevers.soort FROM werkgevers LEFT JOIN werknemers ON (werkgevers.email = werknemers.email AND werkgevers.wachtwoord =                                       werknemers.wachtwoord AND werkgevers.soort = werknemers.soort AND werkgevers.id = werknemers.id) UNION SELECT werknemers.id, werknemers.email, werknemers.wachtwoord, werknemers.soort FROM                                 werknemers LEFT JOIN werkgevers ON (werknemers.email = werkgevers.email AND werknemers.wachtwoord = werkgevers.wachtwoord AND werknemers.soort = werkgevers.soort AND werknemers.id =                                          werkgevers.id)");
            $sql->execute();

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row) 
            {
                if ($email == $row['email']) {
                    $wachtwoord = $row['wachtwoord'];
                    
                    return true;
                    break;
                }
            }
            
            return false;
        }
    
    if (!empty($email) && checkEmail()) {
            global $wachtwoord;
            global $bekend;
            $onderwerp = 'Stagepeer: uw persoonlijke wachtwoord';
            $bericht = 'Uw wachtwoord bij stagepeer.nl is: '.$wachtwoord;
            
            $headers = "From: <Stagepeer> "; 
            $headers .= "Content-type: text/html; charset=iso-8859-1 "; 
            $headers .= "Return-Path: Mail-Error <services@stagepeer.nl> "; 
            mail($email, $onderwerp, $bericht, $headers);
            $bekend = true;
        }
    }
?>

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
                
                <input type="submit" class="login_button" value="Aanvragen" name="submit">
            </form>
        <?php
            global $bekend;
            if (isset($_POST['submit'])) {
                if ($bekend) {
                    echo '<div class="vergeten_div">Uw wachtwoord is verstuurd.</div>';
                } else {
                    echo '<div class="vergeten_div">Dit e-mailadres is niet bij ons bekend.</div>';
                }    
            }            
        ?>
        </div>
    </div>
</main>
<!-- /MAIN AREA -->

<!-- FOOTER AREA -->
<?php include './includes/footer.php';?>
<!-- /FOOTER AREA -->