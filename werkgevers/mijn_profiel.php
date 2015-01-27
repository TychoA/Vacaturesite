<?php session_start();

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid']))) {
    $bedrijfID = $_SESSION['werkgeverid'];
} else {
    header ( 'Location:../login_pagina.php');
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
                <a href="<?php echo $vacature_toevoegen; ?>">Vacature toevoegen</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werkgevers.php';?>
            
        <main>
            <h1>Profiel</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
            </p>
                
            <div class="full">
                <h2>Algemene Informatie</h2>
                
                <div class="edit_face">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>Logo</h4>
                    <img class="preview_face" src="../img/logo.png" alt="Naam" />
                </div>
                    
                <div class="edit_name">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>Naam</h4>
                    <p>Naam Bedrijf</p>
                </div>
                    
                <div class="edit_email">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>E-mail</h4>
                    <p>info@naambedrijf.com</p>
                </div>
                    
                <div class="edit_phone">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>Telefoonnummer</h4>
                    <p>+ (31) 20 6 12 34 56</p>
                </div>
                    
                <div class="edit_location">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>Locatie</h4>
                    <p>Amsterdam, Noord-Holland</p>
                </div>
                    
                <div class="edit_kvk">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>KvK-nummer</h4><p>01234567</p>
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