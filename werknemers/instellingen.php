<?php session_start(); 

    // Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
    if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
         $userID = $_SESSION['werknemerid'];
    } else {
        session_destroy();
        header ('Location:../login_pagina.php');
    }
    

    if (isset($_POST['submit'])) {
        $oud_ww = trim(strip_tags($_POST['old_password']));
        $nieuw_ww = trim(strip_tags($_POST['new_password']));
        $herhaal_ww = trim(strip_tags($_POST['new_password_again']));
        
        function checkOudWachtwoord($input) {
            include '../includes/connect.php';
            $sql_changepw = $db->prepare("SELECT wachtwoord FROM werknemers WHERE ID =:id LIMIT 1");
            $sql_changepw ->execute(array(
                'id' => $_SESSION['werknemerid']
            )); 
            $result =  $sql_changepw ->fetch();
            $ww = $result['wachtwoord'];
            
            if ($ww == $input) {
                return true;
            } else {
                return false;
            }
        }
        
        if ((!empty($oud_ww) && !empty($nieuw_ww) && !empty($herhaal_ww)) && ($nieuw_ww == $herhaal_ww) && checkOudWachtwoord($oud_ww)) {
            // Updaten maar
            include '../includes/connect.php';
            $update_ww = "UPDATE werknemers
                              SET wachtwoord = :new_wachtwoord
                              WHERE ID = :userID";
            $sth_ww = $db->prepare($update_ww);
            $sth_ww->execute(array( 
                ':new_wachtwoord' => $nieuw_ww,
                ':userID' => $_SESSION['werknemerid']
            ));    
            
            echo '<script>alert("Uw wachtwoord is succesvol veranderd!");</script>';
        } else {
            echo '<script>alert("Uw wachtwoord kon niet veranderd worden! Probeer het opnieuw.");</script>';
        }
    }
    
?>
<html>
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include '../includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_account; ?>">Mijn Account</a>
                <span class="dash">/</span>
                <a href="<?php echo $instellingen; ?>">Wachtwoord aanpassen</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werknemers.php';?>
            
        <main>
            <h1>Wachtwoord aanpassen</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    &#171; Terug naar overzicht
                </a>
            </p>
                
            <div class="full edit_password">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            	    <h4>Oud wachtwoord</h4><input type="password" name="old_password" placeholder="..." />
            	    <h4>Nieuw wachtwoord</h4><input type="password" name="new_password" placeholder="..." />
            	    <h4>Herhaal nieuw wachtwoord</h4><input type="password" name="new_password_again" placeholder="..." />
            	<input id="submit" type="submit" name="submit" value="Opslaan">
            	</form>
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>