<?php session_start(); 

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid']))) {
    $bedrijfID = $_SESSION['werkgeverid'];
    $userID = $_GET['id'];
    include './includes/connect.php';
} else if (isset($_SESSION['werknemerid']) && $_SESSION['werknemerid'] == $_GET['id']) {
    $userID = $_SESSION['werknemerid'];
    include './includes/connect.php';
}
else {
    header ( 'Location:./login_pagina.php');
}

?>
<html>
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include './includes/header.php';
    
        $sql_info = $db->prepare("SELECT * FROM werknemers WHERE id=:id");
        $sql_info->execute(array( 
           ':id' => $userID
         ));
    
        while($row = $sql_info->fetch(PDO::FETCH_ASSOC)) { 
            $naam = $row['naam'];
            $achternaam = $row['achternaam'];
            $email = $row['email'];
            $tel = $row['telefoonnummer'];
            $locatie = $row['plaatsnaam'];
            $samenvatting = $row['samenvatting'];
        }
    
    ?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Profielen</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper">              
        <main>
            <h1><?php echo $naam.' '.$achternaam ?></h1>
                
            <div class="full">
                <h2>Algemene Informatie</h2>
                
                <div class="profiel_face">
                <!--   MOET NOG GEDAAN WORDEN  -->
                    <img class="face profiel_face_img" src="./img/me.png" alt="Naam" />
                </div>
                    
                <div class="edit_name">
                    <h4>Naam</h4>
                    <p><?php echo $naam.' '.$achternaam ?></p>
                </div>
                   
                <div class="edit_email">
                    <h4>E-mail</h4>
                    <p><?php echo $email ?></p>
                </div>
                    
                <div class="edit_phone">
                    <h4>Telefoonnummer</h4>
                    <p><?php echo $tel ?></p>
                </div>
                    
                <div class="edit_location">
                    <h4>Locatie</h4>
                    <p><?php echo $locatie ?></p>
                </div>
            </div>
                
            <div class="full">
                <h2>Samenvatting</h2>
                    
                <p><?php echo $samenvatting ?></p>      
            </div>
                
            <div class="full">
                <h2>Skills</h2>
                <?php 
                
                    $sql_skills = $db->prepare("SELECT * FROM skills WHERE ID_werknemer=:id");
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
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>