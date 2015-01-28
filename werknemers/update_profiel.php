<?php session_start(); 

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
} else {
    header ( 'Location:../login_pagina.php');
}

include '../includes/connect.php';

$stmt = $db->prepare("SELECT url_foto, naam, achternaam, email, telefoonnummer, plaatsnaam, samenvatting FROM werknemers WHERE id=:id");
$stmt->execute(array(':id' => $userID));

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $url_foto = $row['url_foto'];
    $naam = $row['naam'] . " " . $row['achternaam'];
    $email = $row['email'];
    $telefoonnummer = $row['telefoonnummer'];
    $locatie = $row['plaatsnaam'];
    $samenvatting = $row['samenvatting'];
}


?>

<html>

    <?php include './linking.php';?>
    
    
        <div id="light" class="white_content">This is the lightbox content. <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>
        <div id="fade" class="black_overlay"></div>
    
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
            <h1 class="edit_profile">Mijn Profiel</h1><a class="bewerken"><i class="fa fa-pencil fa-fw"></i>bewerken</a>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
            </p>
                
            <div class="full">
                <h2>Algemene Informatie</h2>
                
                <div class="edit_face">
                    <h4>Foto</h4>
                    <img class="preview_face" src="<?php echo $url_foto; ?>" alt="<?php echo $naam; ?>" />
                </div>
                    
                <div class="edit_name">
                    <h4>Naam</h4>
                    <p><?php echo $naam; ?></p>
                </div>
                   
                <div class="edit_email">
                    <h4>E-mail</h4>
                    <p><?php echo $email; ?></p>
                </div>
                    
                <div class="edit_phone">
                    <h4>Telefoonnummer</h4>
                    <p><?php echo $telefoonnummer; ?></p>
                </div>
                    
                <div class="edit_location">
                    <h4>Locatie</h4>
                    <p><?php echo $locatie; ?></p>
                </div>
            </div>
                
            <div class="full">
                <h2><i class="fa fa-pencil fa-fw"></i> Samenvatting</h2>
                    
                <p><?php echo $samenvatting; ?></p>      
            </div>
                
            <div class="full">
                <h2>Jouw Skills</h2>
                <p class="uitleg">Klik op een skill om hem te verwijderen of te bewerken.</p>
                    
                <?php 
                
                    $sql_skills = $db->prepare("SELECT * FROM skills WHERE ID_werknemers=:id");
                    $sql_skills->execute(array( 
                       ':id' => $userID
                     ));

                    $skills = [];
                    
                    while($row_skill = $sql_skills->fetch(PDO::FETCH_ASSOC)) { 
                        $skill_naam = $row_skill['skill'];
                        $sterren = $row_skill['vaardigheid'];
                        $temp = [$skill_naam, $sterren];
                        
                        array_push($skills, $temp);
                    }


                    function setStars($aantal) {
                        $open = '<i class="fa fa-star-o fa-lg"></i>';
                        $dicht = '<i class="fa fa-star fa-lg"></i>';
                        $stars = '';
                        
                        for ($j = 0; $j < 5; $j++) {
                            if ($aantal > 0) {
                                $stars = $stars.$dicht;
                                $aantal--;
                            } else {
                                $stars = $stars.$open;
                            }
                        }
                        
                        return $stars;
                    }
                    

                    for ($i = 0; $i < count($skills); $i++) {
                        $sk_naam = $skills[$i][0];
                        $nummer = $skills[$i][1];
                        $set_star = setStars($nummer);
                        echo '
                            <div class="skill"><p>'.$sk_naam.'</p>
                                '.$set_star.'
                            </div>';
                    }

                ?>
                
                <div class="add">
                    <p><i class="fa fa-plus fa"></i></p>
                </div>
            </div>
                
            <div class="full">
                <h2>Diploma's en Certificaten</h2>
                
                <?php 
                
                    $sql_cv = $db->prepare("SELECT * FROM cv WHERE ID_werknemers=:id AND type='diploma'");
                    $sql_cv->execute(array( 
                       ':id' => $userID
                    ));
                    
                    $all_cv = [];

                    while($row_cv = $sql_cv->fetch(PDO::FETCH_ASSOC)) {
                        $naam_diploma = $row_cv['naam'];
                        $instituut = $row_cv['instituut'];
                        $datum = $row_cv['datum'];
                        $cv_bericht = $row_cv['beschrijving'];
                        
                        $temp_cv = [$naam_diploma, $instituut, $datum, $cv_bericht];
                        array_push($all_cv, $temp_cv);
                    }
                    
                    for ($k = 0; $k < count($all_cv); $k++) {
                        $cv_naam =  $all_cv[$k][0];
                        $cv_instituut =  $all_cv[$k][1];
                        $cv_datum =  $all_cv[$k][2];
                        $cv_bricht =  $all_cv[$k][3];
                        
                        echo '
                              <div class="ber_mini diploma">
                                <h4>'.$cv_naam.'</h4>
                                <p class="ber_mini_info">'.$cv_instituut.' | '.$cv_datum.'</p>
                                <p>'.$cv_bericht.'</p>
                            </div> 
                        
                        
                        ';
                    }
                    
                ?>
            </div>
            
            <div class="full">
                <h2>Werkervaring</h2>
                
                
                <?php 
                
                    $sql_cv = $db->prepare("SELECT * FROM cv WHERE ID_werknemers=:id AND type='werkervaring'");
                    $sql_cv->execute(array( 
                       ':id' => $userID
                    ));
                    
                    $all_cv = [];

                    while($row_cv = $sql_cv->fetch(PDO::FETCH_ASSOC)) {
                        $naam_diploma = $row_cv['naam'];
                        $instituut = $row_cv['instituut'];
                        $datum = $row_cv['datum'];
                        $cv_bericht = $row_cv['beschrijving'];
                        
                        $temp_cv = [$naam_diploma, $instituut, $datum, $cv_bericht];
                        array_push($all_cv, $temp_cv);
                    }
                    
                    for ($k = 0; $k < count($all_cv); $k++) {
                        $cv_naam =  $all_cv[$k][0];
                        $cv_instituut =  $all_cv[$k][1];
                        $cv_datum =  $all_cv[$k][2];
                        $cv_bricht =  $all_cv[$k][3];
                        
                        echo '
                              <div class="ber_mini diploma">
                                <h4>'.$cv_naam.'</h4>
                                <p class="ber_mini_info">'.$cv_instituut.' | '.$cv_datum.'</p>
                                <p>'.$cv_bericht.'</p>
                            </div> 
                        
                        
                        ';
                    }
                    
                ?>
            </div>
                
            <div class="full">
                <h2>Opleidingen en Cursussen</h2>
                <?php 
                
                    $sql_cv = $db->prepare("SELECT * FROM cv WHERE ID_werknemers=:id AND type='opleiding'");
                    $sql_cv->execute(array( 
                       ':id' => $userID
                    ));
                    
                    $all_cv = [];

                    while($row_cv = $sql_cv->fetch(PDO::FETCH_ASSOC)) {
                        $naam_diploma = $row_cv['naam'];
                        $instituut = $row_cv['instituut'];
                        $datum = $row_cv['datum'];
                        $cv_bericht = $row_cv['beschrijving'];
                        
                        $temp_cv = [$naam_diploma, $instituut, $datum, $cv_bericht];
                        array_push($all_cv, $temp_cv);
                    }
                    
                    for ($k = 0; $k < count($all_cv); $k++) {
                        $cv_naam =  $all_cv[$k][0];
                        $cv_instituut =  $all_cv[$k][1];
                        $cv_datum =  $all_cv[$k][2];
                        $cv_bricht =  $all_cv[$k][3];
                        
                        echo '
                              <div class="ber_mini diploma">
                                <h4>'.$cv_naam.'</h4>
                                <p class="ber_mini_info">'.$cv_instituut.' | '.$cv_datum.'</p>
                                <p>'.$cv_bericht.'</p>
                            </div> 
                        
                        
                        ';
                    }
                    
                ?>
            </div>
                
            <div class="full">
                <h2>Talen</h2>
                
                <?php 
                
                    $sql_cv = $db->prepare("SELECT * FROM taal WHERE ID_werknemers=:id");
                    $sql_cv->execute(array( 
                       ':id' => $userID
                    ));
                    
                    $all_taal = [];

                    while($row_cv = $sql_cv->fetch(PDO::FETCH_ASSOC)) {
                        $taal = $row_cv['taal'];
                        $vaardig = $row_cv['vaardigheid'];
                        
                        $temp_taal = [$taal, $vaardig];
                        array_push($all_taal, $temp_taal);
                    }
                    
                    for ($l = 0; $l < count($all_taal); $l++) {
                        $taal_naam =  $all_taal[$l][0];
                        $taal_nummer =  $all_taal[$l][1];
                        
                        echo '
                              <div class="taal">
                                <p>'.$taal_naam.'</p>
                                <p>|</p>
                                <p>'.$taal_nummer.'</p>
                            </div> 
                        
                        
                        ';
                    }
                    
                ?>
                
                
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