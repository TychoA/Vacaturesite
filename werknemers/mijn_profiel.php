<?php session_start(); 

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
} else {
    header ( 'Location:../login_pagina.php');
}

include '../includes/connect.php';

if (isset($_POST['url_foto'], $_POST['naam'], $_POST['achternaam'], $_POST['email'], $_POST['telefoonnummer'], $_POST['locatie'], $_POST['studierichting'], $_POST['samenvatting'])) {
    if ($_POST['url_foto'] == "") {
        $url_foto = "http://ik44.webdb.fnwi.uva.nl/Vacaturesite/img/empty.png"; 
    } else {
        $url_foto = strip_tags($_POST['url_foto']); 
    }
    
    $naam = strip_tags($_POST['naam']);
    $achternaam = strip_tags($_POST['achternaam']);
    $email = strip_tags($_POST['email']);
    $telefoonnummer = strip_tags($_POST['telefoonnummer']);
    $locatie = strip_tags($_POST['locatie']);
    $studierichting = strip_tags($_POST['studierichting']);
    $samenvatting = strip_tags($_POST['samenvatting']);
    
    $stmt = $db->prepare("UPDATE werknemers 
    SET url_foto=:url_foto, naam=:naam, achternaam=:achternaam, email=:email, telefoonnummer=:telefoonnummer, locatie=:locatie, studierichting=:studierichting, samenvatting=:samenvatting 
    WHERE id=:id");
    $stmt->execute(array(':id' => $userID, 
                         ':url_foto' => $url_foto,
                         ':naam' => $naam, 
                         ':achternaam' => $achternaam,
                         ':email' => $email, 
                         ':telefoonnummer' => $telefoonnummer,
                         ':locatie' => $locatie,
                         ':studierichting' => $studierichting,
                         ':samenvatting' => $samenvatting
                        ));
    $mededeling = "Uw gegevens zijn ge&#252;pdate!";
}


$stmt = $db->prepare("SELECT url_foto, naam, achternaam, email, telefoonnummer, locatie, studierichting, samenvatting FROM werknemers WHERE id=:id");
$stmt->execute(array(':id' => $userID));

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $url_foto = $row['url_foto'];
    $naam = $row['naam'];
    $achternaam = $row['achternaam'];
    $email = $row['email'];
    $telefoonnummer = $row['telefoonnummer'];
    $locatie = $row['locatie'];
    $studierichting = $row['studierichting'];
    $samenvatting = $row['samenvatting'];
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
            <h1 class="edit_profile">Mijn Profiel</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    &#171; Terug naar overzicht
                </a>
                <a class="openbare_profiel" href="../profiel_werknemer.php?id=<?php echo $userID; ?>" target="_blank">
                    bekijk hier je openbare profiel
                </a>
            </p>
            
            
            <?php if (isset($mededeling)) { ?>
                <div class="full mededeling">
                    <p><?php echo $mededeling; ?></p>
                </div>
            <?php } ?>
            
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="full">
                    <h2>Algemene Informatie</h2>

                    <div class="edit_face">
                        <h4>Foto</h4>
                        <?php if ($url_foto == "http://ik44.webdb.fnwi.uva.nl/Vacaturesite/img/empty.png") { ?>
                            <input type="text" name="url_foto" placeholder="Voeg hier de link van vierkante foto toe">
                        <?php } else { ?>
                            <input type="text" name="url_foto" value="<?php echo $url_foto; ?>">
                        <?php } ?>
                        <br>
                        <p>Preview:</p><img class="preview_face" src="<?php echo $url_foto; ?>" />
                    </div>

                    <div class="edit_name">
                        <h4>Naam</h4>
                        <input type="text" name="naam" value="<?php echo $naam; ?>" placeholder="Voornaam..." required>
                        <input type="text" name="achternaam" value="<?php echo $achternaam; ?>" placeholder="Achternaam..." required>
                    </div>

                    <div class="edit_email">
                        <h4>E-mail</h4>
                        <input type="email" name="email" value="<?php echo $email; ?>" placeholder="E-mail..." required>
                    </div>

                    <div class="edit_phone">
                        <h4>Telefoonnummer</h4>
                        <input type="tel" name="telefoonnummer" value="<?php echo $telefoonnummer; ?>" placeholder="Telefoonnummer...">
                    </div>

                    <div class="edit_location">
                        <h4>Locatie</h4>
                        <select name="locatie">
                            <option value="<?php echo $locatie; ?>"><?php echo $locatie; ?></option>
                            <option value="Noord-Holland">Noord-Holland</option>
                            <option value="Zuid-Holland">Zuid-Holland</option>
                            <option value="Utrecht">Utrecht</option>
                            <option value="Flevoland">Flevoland</option>
                            <option value="Gelderland">Gelderland</option>
                            <option value="Overijssel">Overijssel</option>
                            <option value="Noord-Brabant">Noord-Brabant</option>
                            <option value="Groningen">Groningen</option>
                            <option value="Drenthe">Drenthe</option>
                            <option value="Friesland">Friesland</option>
                            <option value="Limburg">Limburg</option>
                            <option value="Zeeland">Zeeland</option>
                            <option value="Internationaal">Internationaal</option>
                        </select>
                    </div>
                    
                    <div class="edit_studie">
                        <h4>Studierichting</h4>
                        <select name="studierichting">
                            <option value="<?php echo $studierichting; ?>"><?php echo $studierichting; ?></option>
                            <option value="Informatica">WO - Informatica</option>
                            <option value="Informatiekunde">WO - Informatiekunde</option>
                            <option value="Informatie, Multimedia, Management">WO - Informatie, Multimedia, Management</option>
                            <option value="Medische Informatiekunde">WO - Medische Informatiekunde</option>
                            <option value="Kunstmatige Intelligentie">WO - Kunstmatige Intelligentie</option>
                            <option value="Anders">Anders</option>
                        </select>
                    </div>

                    <input type="submit" value="Opslaan" id="opslaan">
                </div>

                <div class="full">
                    <h2>Samenvatting</h2>
                    <textarea id="samenvatting" name="samenvatting"><?php echo $samenvatting; ?></textarea> 
                    <input type="submit" value="Opslaan" id="opslaan">
                </div>

                <div class="full">
                    <a name="skills"><h2>Jouw Skills</h2></a> 

                    <?php 

                        $sql_skills = $db->prepare("SELECT * FROM skills WHERE ID_werknemers=:id");
                        $sql_skills->execute(array( 
                           ':id' => $userID
                         ));

                        $skills = [];

                        while($row_skill = $sql_skills->fetch(PDO::FETCH_ASSOC)) { 
                            $skill_id = $row_skill['ID'];
                            $skill_naam = $row_skill['skill'];
                            $sterren = $row_skill['vaardigheid'];
                            $temp = [$skill_id, $skill_naam, $sterren];

                            array_push($skills, $temp);
                        }


                        function setStars($aantal) {
                            $open = '<span class="star-o"></span>';
                            $dicht = '<span class="star"></span>';
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
                            $sk_id = $skills[$i][0];
                            $sk_naam = $skills[$i][1];
                            $nummer = $skills[$i][2];
                            $set_star = setStars($nummer);
                            echo '
                                <div class="skill"><p>'.$sk_naam.'</p>
                                    '.$set_star.'
                                    <a href="remove_from_profile.php?id='.$sk_id.'&kind=skill"><div class="delete_skill"><span class="close-white"></span></div></a>
                                </div>
                                ';
                        }

                    ?>

                    <a href="add_to_profile.php?kind=Skill"><div class="add">
                        <span class="plus"></span>
                    </div></a>
                </div>
            </form>
                
            <div class="full">
                <a name="diploma"><h2>Diploma's en Certificaten</h2></a>
                
                <?php 
                
                    $sql_cv = $db->prepare("SELECT * FROM cv WHERE ID_werknemers=:id AND type='diploma'");
                    $sql_cv->execute(array( 
                       ':id' => $userID
                    ));
                    
                    $all_cv = [];

                    while($row_cv = $sql_cv->fetch(PDO::FETCH_ASSOC)) {
                        $id_diploma = $row_cv['ID'];
                        $naam_diploma = $row_cv['naam'];
                        $instituut = $row_cv['instituut'];
                        $datum = $row_cv['datum'];
                        $locatie = $row_cv['locatie'];
                        $cv_bericht = $row_cv['beschrijving'];
                        
                        $temp_cv = [$id_diploma, $naam_diploma, $instituut, $datum, $locatie, $cv_bericht];
                        array_push($all_cv, $temp_cv);
                    }
                    
                    for ($k = 0; $k < count($all_cv); $k++) {
                        $cv_id =  $all_cv[$k][0];
                        $cv_naam =  $all_cv[$k][1];
                        $cv_instituut =  $all_cv[$k][2];
                        $cv_datum =  $all_cv[$k][3];
                        $cv_locatie =  $all_cv[$k][4];
                        $cv_bericht =  $all_cv[$k][5];
                        
                        echo '
                              <div class="ber_mini diploma">
                                <a href="remove_from_profile.php?id='.$cv_id.'&kind=diploma"><div class="delete_cv"><span class="close-white"></span></div></a>
                                <h4>'.$cv_naam.'</h4>
                                <p class="ber_mini_info">'.$cv_instituut.' | '.$cv_locatie.' | '.$cv_datum.'</p>
                                <p>'.$cv_bericht.'</p>
                            </div> 
                        
                        
                        ';
                    }
                    
                ?>
                <a href="add_to_profile.php?kind=diploma"><div class="ber_mini diploma">
                    <p><span class="plus"></span> Nieuwe diploma of certificaat toevoegen</p>
                </div></a>
            </div>
            
            <div class="full">
                <a name="werkervaring"><h2>Werkervaring</h2></a>
                
                
                <?php 
                
                    $sql_cv = $db->prepare("SELECT * FROM cv WHERE ID_werknemers=:id AND type='werkervaring'");
                    $sql_cv->execute(array( 
                       ':id' => $userID
                    ));
                    
                    $all_cv = [];

                    while($row_cv = $sql_cv->fetch(PDO::FETCH_ASSOC)) {
                        $id_werkervaring = $row_cv['ID'];
                        $naam_werkervaring = $row_cv['naam'];
                        $instituut = $row_cv['instituut'];
                        $datum = $row_cv['datum'];
                        $locatie = $row_cv['locatie'];
                        $cv_bericht = $row_cv['beschrijving'];
                        
                        $temp_cv = [$id_werkervaring, $naam_werkervaring, $instituut, $datum, $locatie, $cv_bericht];
                        array_push($all_cv, $temp_cv);
                    }
                    
                    for ($k = 0; $k < count($all_cv); $k++) {
                        $cv_id =  $all_cv[$k][0];
                        $cv_naam =  $all_cv[$k][1];
                        $cv_instituut =  $all_cv[$k][2];
                        $cv_datum =  $all_cv[$k][3];
                        $cv_locatie =  $all_cv[$k][4];
                        $cv_bericht =  $all_cv[$k][5];
                        
                        echo '
                              <div class="ber_mini diploma">
                                <a href="remove_from_profile.php?id='.$cv_id.'&kind=werkervaring"><div class="delete_cv"><span class="close-white"></span></div></a>
                                <h4>'.$cv_naam.'</h4>
                                <p class="ber_mini_info">'.$cv_instituut.' | '.$cv_locatie.' | '.$cv_datum.'</p>
                                <p>'.$cv_bericht.'</p>
                            </div> 
                        
                        
                        ';
                    }
                    
                ?>
                <a href="add_to_profile.php?kind=Werkervaring"><div class="ber_mini diploma">
                    <p><span class="plus"></span> Nieuwe werkervaring toevoegen</p>
                </div></a>
            </div>
                
            <div class="full">
                <a name="opleiding"><h2>Opleidingen en Cursussen</h2>
                <?php 
                
                    $sql_cv = $db->prepare("SELECT * FROM cv WHERE ID_werknemers=:id AND type='opleiding'");
                    $sql_cv->execute(array( 
                       ':id' => $userID
                    ));
                    
                    $all_cv = [];

                    while($row_cv = $sql_cv->fetch(PDO::FETCH_ASSOC)) {
                        $id_opleiding = $row_cv['ID'];
                        $naam_opleiding = $row_cv['naam'];
                        $instituut = $row_cv['instituut'];
                        $datum = $row_cv['datum'];
                        $locatie = $row_cv['locatie'];
                        $cv_bericht = $row_cv['beschrijving'];
                        
                        $temp_cv = [$id_opleiding, $naam_opleiding, $instituut, $datum, $locatie, $cv_bericht];
                        array_push($all_cv, $temp_cv);
                    }
                    
                    for ($k = 0; $k < count($all_cv); $k++) {
                        $cv_id =  $all_cv[$k][0];
                        $cv_naam =  $all_cv[$k][1];
                        $cv_instituut =  $all_cv[$k][2];
                        $cv_datum =  $all_cv[$k][3];
                        $cv_locatie =  $all_cv[$k][4];
                        $cv_bricht =  $all_cv[$k][4];
                        
                        echo '
                              <div class="ber_mini diploma">
                                <a href="remove_from_profile.php?id='.$cv_id.'&kind=opleiding"><div class="delete_cv"><span class="close-white"></span></div></a>
                                <h4>'.$cv_naam.'</h4>
                                <p class="ber_mini_info">'.$cv_instituut.' | '.$cv_locatie.' | '.$cv_datum.'</p>
                                <p>'.$cv_bericht.'</p>
                            </div> 
                        
                        
                        ';
                    }
                    
                ?>
                <a href="add_to_profile.php?kind=opleiding"><div class="ber_mini diploma">
                    <p><span class="plus"></span> Nieuwe opleiding of cursus toevoegen</p>
                </div></a>
            </div>
                
            <div class="full">
                <a name="talen"><h2>Talen</h2></a>
                
                <?php 
                
                    $sql_cv = $db->prepare("SELECT * FROM taal WHERE ID_werknemers=:id");
                    $sql_cv->execute(array( 
                       ':id' => $userID
                    ));
                    
                    $all_taal = [];

                    while($row_cv = $sql_cv->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row_cv['ID'];
                        $taal = $row_cv['taal'];
                        $vaardig = $row_cv['vaardigheid'];
                        
                        $temp_taal = [$id, $taal, $vaardig];
                        array_push($all_taal, $temp_taal);
                    }
                    
                    for ($l = 0; $l < count($all_taal); $l++) {
                        $taal_id =  $all_taal[$l][0];
                        $taal_naam =  $all_taal[$l][1];
                        $taal_nummer =  $all_taal[$l][2];
                        
                        echo '
                              <div class="taal">
                                <p>'.$taal_naam.'</p>
                                <p>|</p>
                                <p>'.$taal_nummer.'</p>
                                <a href="remove_from_profile.php?id='.$taal_id.'&kind=taal"><div class="delete_taal"><span class="close-white"></span></div></a>
                            </div> 
                        
                        
                        ';
                    }
                    
                ?>
                
                
                <a href="add_to_profile.php?kind=Taal"><div class="add">
                    <span class="plus"></span>
                </div></a>
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>