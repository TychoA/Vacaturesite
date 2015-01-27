<?php session_start();

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
} else {
    header ( 'Location:../login_pagina.php');
}

?>
   <html>
    <?php include '../includes/connect.php';?>
    
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include '../includes/header_admin.php';?>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper">  
            
        <main>
            <div class="full admin">
                <h1>Beheer</h1>
                
                <a href="admin_werkgevers.php"><div class="admin_button">werkgevers</div></a>
                <a href="admin_werknemers.php"><div class="admin_button button_center">werknemers</div></a>
                <a href="admin_vacatures.php"><div class="admin_button">vacatures</div></a>
                
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>