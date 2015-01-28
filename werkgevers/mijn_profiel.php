<?php session_start();

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid']))) {
    $bedrijfID = $_SESSION['werkgeverid'];
} else {
    header ( 'Location:../login_pagina.php');
}

include '../includes/connect.php';

if (isset($_POST['naam'], $_POST['email'], $_POST['telefoonnummer'], $_POST['locatie'], $_POST['kvk'], $_POST['url_foto'])) {
    
    if ($_POST['url_foto'] == "") {
        $url_foto = "http://ik44.webdb.fnwi.uva.nl/Vacaturesite/img/empty.png"; 
    } else {
        $url_foto = $_POST['url_foto']; 
    }
    
    $stmt = $db->prepare("UPDATE werkgevers 
    SET url_foto=:url_foto, naam=:naam, email=:email, telefoonnummer=:telefoonnummer, locatie=:locatie, kvk=:kvk 
    WHERE id=:id");
    $stmt->execute(array(':id' => $bedrijfID, 
                         ':url_foto' => $url_foto,
                         ':naam' => $_POST['naam'], 
                         ':email' => $_POST['email'], 
                         ':telefoonnummer' => $_POST['telefoonnummer'],
                         ':locatie' => $_POST['locatie'],
                         ':kvk' => $_POST['kvk']
                        ));
    $mededeling = "Uw gegevens zijn ge&#252;pdate!";
}


$stmt = $db->prepare("SELECT url_foto, naam, email, telefoonnummer, locatie, kvk FROM werkgevers WHERE id=:id");
$stmt->execute(array(':id' => $bedrijfID));

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $url_foto = $row['url_foto'];
    $naam = $row['naam'];
    $email = $row['email'];
    $telefoonnummer = $row['telefoonnummer'];
    $locatie = $row['locatie'];
    $kvk = $row['kvk'];
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
                <a href="<?php echo $mijn_profiel; ?>">Mijn profiel</a>
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
                    &#171; Terug naar overzicht
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
                        <h4>Logo</h4>
                        <?php if ($url_foto == "http://ik44.webdb.fnwi.uva.nl/Vacaturesite/img/empty.png") { ?>
                            <input type="text" name="url_foto" placeholder="Voeg hier de link van vierkante foto toe">
                        <?php } else { ?>
                            <input type="text" name="url_foto" value="<?php echo $url_foto; ?>">
                        <?php } ?>
                        <br>
                        <p>Preview:</p><img class="preview_face" src="<?php echo $url_foto; ?>" />
                    </div>

                    <div class="edit_bedrijf">
                        <h4>Naam</h4>
                        <input type="text" name="naam" value="<?php echo $naam; ?>" placeholder="Voornaam..." required>
                    </div>

                    <div class="edit_email">
                        <h4>E-mail</h4>
                        <input type="email" name="email" value="<?php echo $email; ?>" placeholder="E-mail..." required>
                    </div>

                    <div class="edit_phone">
                        <h4>Telefoonnummer</h4>
                        <input type="number" name="telefoonnummer" value="<?php echo $telefoonnummer; ?>" placeholder="Telefoonnummer...">
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

                    <div class="edit_kvk">
                        <h4>KvK-nummer</h4>
                        <input type="number" name="kvk" value="<?php echo $kvk; ?>" placeholder="KvK-nummer...">
                    </div>
                    <input type="submit" value="Opslaan" id="opslaan">
                </div>
            </form>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>