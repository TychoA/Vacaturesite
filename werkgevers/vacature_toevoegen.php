<?php session_start();

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid']))) {
    $bedrijfID = $_SESSION['werkgeverid'];
} else {
    header ( 'Location:../login_pagina.php');
}

include '../includes/connect.php';

if (isset($_POST['titel'], $_POST['duur'], $_POST['omgeving'], $_POST['logo'], $_POST['aangeboden'], $_POST['eisen'])) {
    
    $titel = strip_tags($_POST['titel']);
    
    if (empty($_POST['studierichting'])) {
        $studierichting = "alles";
    } else {
        $studierichting = implode(", ", $_POST['studierichting']);
    }

    $beschrijving_aanbod = $_POST['aangeboden'];
    $aanbod = strip_tags($beschrijving_aanbod);
    
    $beschrijving_eisen = $_POST['eisen'];
    $eisen = strip_tags($beschrijving_eisen);

    if (empty($_POST['overig'])) {
        $overig = "-";
    } else {
        $beschrijving_overige = $_POST['overig'];
        $overig = strip_tags($beschrijving_overige);
    }

    if (empty($_POST['tags'])) {
        $tags = "-";
    } else {
        $tags = $_POST['tags'];
        $striptags = strip_tags($tags);
    }


    $stmt = $db->prepare("INSERT INTO vacatures(ID_werkgevers, duur, opleidingen, locatie, foto, titel, beschrijving_aanbod, beschrijving_eisen, beschrijving_overige, tags) VALUES(:idwerkgevers,:duur,:opleidingen,:locatie,:foto,:titel,:beschrijving_aanbod,:beschrijving_eisen,:beschrijving_overige, :tags)");
    $stmt->execute(array(':idwerkgevers' => $bedrijfID, ':duur' => $_POST['duur'], ':opleidingen' => $studierichting, ':locatie' => $_POST['omgeving'], ':foto' => $_POST['logo'], ':titel' => $titel, ':beschrijving_aanbod' => $aanbod, ':beschrijving_eisen' => $eisen, ':beschrijving_overige' => $overig, ':tags' => $striptags));

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
           <h1>Vacature toevoegen</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    &#171; Terug naar overzicht
                </a>
            </p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="full vac_toevoegen">
                    <p class="info">Velden met * zijn verplicht</p>
                    <h2>Informatie</h2>

                    <h4>Titel*</h4><input type="text" name="titel" placeholder="Titel van de vacature..." required>

                    <h4>Duur van stage*</h4>
                    <input id="duur" type="radio" name="duur" value="6 maanden" checked > <span id="duur_tag">0,5 jaar</span>
                    <input id="duur" type="radio" name="duur" value="1 jaar"> <span id="duur_tag">1 jaar</span>
                    <input id="duur" type="radio" name="duur" value="2 jaar"> <span id="duur_tag">2 jaar</span> 
                    <input id="duur" type="radio" name="duur" value="Anders"> <span id="duur_tag">Anders</span> 

                    <h4>Omgeving</h4>
                    <select name="omgeving">
                        <option value="alles">Selecteer...</option>
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
                        
                    <h4>Studierichtingen</h4>
                    <div class="studierichtingen">
                        <input id="checkbox" type="checkbox" name="studierichting[]" value="Informatica"> 
                        <span id="checkbox_tag">WO - Informatica</span> <br>
                        <input id="checkbox" type="checkbox" name="studierichting[]" value="Informatiekunde">
                        <span id="checkbox_tag">WO - Informatiekunde</span>  <br>
                        <input id="checkbox" type="checkbox" name="studierichting[]" value="Informatie Multimedia Management"> 
                        <span id="checkbox_tag">WO - Informatie, Multimedia, Management</span> <br>
                        <input id="checkbox" type="checkbox" name="studierichting[]" value="Medische Informatiekunde">
                        <span id="checkbox_tag">WO - Medische Informatiekunde</span> <br>
                        <input id="checkbox" type="checkbox" name="studierichting[]" value="Kunstmatige Intelligentie">
                        <span id="checkbox_tag">WO - Kunstmatige Intelligentie</span> <br>
                        <input id="checkbox" type="checkbox" name="studierichting[]" value="Anders">
                        <span id="checkbox_tag">Anders</span>
                    </div>
                        
                    <h4>Bedrijfslogo weergeven*</h4>
                    <input id="logo" type="radio" name="logo" value="1" checked > <span id="logo_tag">Ja</span>
                    <input id="logo" type="radio" name="logo" value="0"> <span id="logo_tag">Nee</span>
                </div>
                
                <div class="full vac_toevoegen_textareas">
                    <h2>Beschrijving</h2>
                    <h4>Wat wordt er aangeboden*</h4>
                    <textarea name="aangeboden" placeholder="..." required></textarea>
                    <h4>De eisen*</h4>
                    <textarea name="eisen" placeholder="..." required></textarea>
                    <h4>Overig</h4>
                    <textarea name="overig" placeholder="..."></textarea>
                    <h4>Tags</h4>
                    <input type="text" id="tags" name="tags" placeholder="Typ hier zoekwoorden/tags...">
                </div>
		            
                <div class="full vac_toevoegen">
                    <input id="toevoegen" type="submit" name="submit" value="Vacature toevoegen">
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