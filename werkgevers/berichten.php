<?php session_start();

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid']))) {
    $bedrijfID = $_SESSION['werkgeverid'];
} else {
    header ( 'Location:../login_pagina.php');
}

?>
<html>
    <?php 
        include './linking.php'; ?>

    <!-- HEADER AREA -->
    <?php include '../includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_account; ?>">Mijn Account</a>
                <span class="dash">/</span>
                <a href="<?php echo $berichten; ?>">Mijn Berichten</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper  beheer">  
        <?php include '../includes/sidebar_werkgevers.php';?>
            
        <main>
            <h1>Mijn berichten</h1>
            <p class="back inbox">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
                <a class="toInbox">
                     Ontvangen
                </a>
                <a class="toSend">
                     Verstuurd
                </a>
            </p>
                
            <div class="full" id="divInbox">
                <?php 
                     include 'inbox.php';
                ?>
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    <script>
    
    </script>
</body>
    
</html>