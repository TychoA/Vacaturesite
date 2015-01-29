   <html>
    <?php 
        session_start();
        include '../includes/connect.php';?>
    
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include '../includes/header_admin.php';
       
    if (isset($_POST['submit'])) {
        $naam = strip_tags(trim($_POST['name']));
        $ww = strip_tags(trim($_POST['ww']));
        $login = false;
        include '../includes/connect.php';
        $sql = $db->prepare("SELECT * FROM administrator");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            if ($row['gebruikersnaam'] == $naam && ($row['wachtwoord'] == $ww)) {
                $_SESSION['admin'] = true;
                $login = true;
                header ( 'Location:index.php');
                break;
            }
        }
        
        if ($login == false) {
            echo '<script>alert("Geen geldige combinatie.");</script>';
        }
    }
    ?>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper">  
            
        <main>
                <div class="wrapper">
                    <h2 class="header-login">Admin login:</h2>
                    <div class="gebruikersnaam">
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                            <label for="gebruikersnaam">Naam</label>
                            <input class="input_gebruikersnaam" type="text" name="name" placeholder="Gebruikersnaam" maxlength="50" required>

                            <label for="wachtwoord">Wachtwoord</label>
                            <input class="input_wachtwoord" type="password" name="ww" placeholder="Wachtwoord" maxlength="50" required>

                            <input type="submit" class="login_button" value="Login" name="submit">
                        </form>    
                    </div>
                </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>