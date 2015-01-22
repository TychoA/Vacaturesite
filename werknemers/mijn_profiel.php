<?php session_start(); 

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
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
                <a href="<?php echo $mijn_profiel; ?>">Mijn Profiel</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werknemers.php';?>
            
        <main>
            <h1>Mijn Profiel</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
            </p>
                
            <div class="full">
                <h2>Algemene Informatie</h2>
                
                <div class="edit_face">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>Foto</h4>
                    <img class="preview_face" src="../img/me.png" alt="Naam" />
                </div>
                    
                <div class="edit_name">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>Naam</h4>
                    <p>Jaap Verhoeven</p>
                </div>
                   
                <div class="edit_email">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>E-mail</h4>
                    <p>jaap.verhoeven@gmail.com</p>
                </div>
                    
                <div class="edit_phone">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>Telefoonnummer</h4>
                    <p>+ (31) 6 12 34 56 78</p>
                </div>
                    
                <div class="edit_location">
                    <i class="fa fa-pencil fa-fw"></i>
                    <h4>Locatie</h4><p>Amsterdam, Noord-Holland</p>
                </div>
            </div>
                
            <div class="full">
                <h2><i class="fa fa-pencil fa-fw"></i> Samenvatting</h2>
                    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo sollicitudin leo vel aliquet. Cras ullamcorper lacinia velit ac suscipit. Maecenas nec auctor turpis. Nunc interdum aliquet tortor, at dignissim libero mattis quis. Nullam varius a nibh eget aliquet.</p> 
                <p>Phasellus commodo diam at viverra tincidunt. Proin in pellentesque neque. Aenean scelerisque quam id libero vulputate luctus nec et mauris. Aliquam a euismod turpis, at semper nibh. </p>
                <p>Morbi porttitor aliquet elit ac ultricies. Aliquam egestas augue commodo finibus pretium. Fusce quis elit a odio accumsan dignissim. Ut augue ipsum, fermentum nec iaculis dictum, finibus fermentum libero.</p>      
            </div>
                
            <div class="full">
                <h2>Jouw Skills</h2>
                    
                <p class="uitleg">Klik op een skill om hem te verwijderen of te bewerken.</p>
                    
                <div class="skill"><p>HTML</p>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                </div>
                <div class="skill"><p>CSS</p>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                </div>
                <div class="skill"><p>PHP</p>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star-o fa-lg"></i>
                    <i class="fa fa-star-o fa-lg"></i>
                </div>
                <div class="skill"><p>jQuery</p>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star-o fa-lg"></i>
                    <i class="fa fa-star-o fa-lg"></i>
                    <i class="fa fa-star-o fa-lg"></i>
                </div>
                <div class="skill"><p>Python</p>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star fa-lg"></i>
                    <i class="fa fa-star-o fa-lg"></i>
                    <i class="fa fa-star-o fa-lg"></i>
                    <i class="fa fa-star-o fa-lg"></i>
                </div>
                <div class="add">
                    <p><i class="fa fa-plus fa"></i></p>
                </div>
            </div>
                
            <div class="full">
                <h2>Diploma's en Certificaten</h2>
                    
                <div class="ber_mini diploma">
                    <h4><i class="fa fa-pencil fa-fw"></i> Naam diploma</h4>
                    <p class="ber_mini_info">Opleidingsinstituut | 24 september 2014</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, a condimentum odio viverra. Proin dictum tincidunt justo, non venenatis leo dictum non.</p>
                </div>
                    
                <div class="ber_mini diploma">
                    <p>
                        <i class="fa fa-plus fa-fw"></i> Voeg diploma of certificaat toe
                    </p>
                </div>
            </div>
                
            <div class="full">
                <h2>Jouw Werkervaring</h2>
                
                <div class="ber_mini ervaring">
                    <h4><i class="fa fa-pencil fa-fw"></i> Functieomschrijving</h4>
                    <p class="ber_mini_info">Bedrijf | datum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, a condimentum odio viverra. Proin dictum tincidunt justo, non venenatis leo dictum non.</p>
                </div>
                    
                <div class="ber_mini ervaring">
                    <h4><i class="fa fa-pencil fa-fw"></i> Functieomschrijving</h4>
                    <p class="ber_mini_info">Bedrijf | datum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, a condimentum odio viverra. Proin dictum tincidunt justo, non venenatis leo dictum non.</p>
                </div>
                    
                <div class="ber_mini ervaring">
                    <p>
                        <i class="fa fa-plus fa-fw"></i> Voeg werkervaring toe
                    </p>
                </div>
            </div>
                
            <div class="full">
                <h2>Jouw Opleidingen en Cursussen</h2>
               
                <div class="ber_mini studie">
                    <h4><i class="fa fa-pencil fa-fw"></i> Naam studie</h4>
                    <p class="ber_mini_info">Opleidingsinstituut | datum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, a condimentum odio viverra. Proin dictum tincidunt justo, non venenatis leo dictum non.</p>
                </div>
                
                <div class="ber_mini studie">
                    <h4><i class="fa fa-pencil fa-fw"></i> Naam studie</h4>
                    <p class="ber_mini_info">Opleidingsinstituut | datum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, a condimentum odio viverra. Proin dictum tincidunt justo, non venenatis leo dictum non.</p>
                </div>
                
                <div class="ber_mini studie">
                    <p>
                        <i class="fa fa-plus fa-fw"></i> Voeg opleiding of cursus toe
                    </p>
                </div>
            </div>
                
            <div class="full">
                <h2>Talen</h2>
                <p class="uitleg">Klik op een taal om hem te verwijderen of te bewerken.</p>
                
                <div class="taal">
                    <p>Nederlands</p>
                    <p>|</p>
                    <p>moedertaal of tweetalig</p>
                </div>
                    
                <div class="taal">
                    <p>Engels</p>
                    <p>|</p>
                    <p>professionele werkvaardigheid</p>
                </div>
                
                <div class="add">
                    <p><i class="fa fa-plus fa"></i></p>
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