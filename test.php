<!-- 
GEDAAN:
    - FULLTEXT INDEX + MyISAM
    - 

LET OP:
    - ZOEKTERM MINIMAAL 4 TEKENS
    - ('+beatles +"Let It Be"' in boolean mode)
      ("+beatles +'Let It Be'" in boolean mode)    

      +beatles +"Let It Be" means that both word "beatles" and phrase "Let It Be" must be present, while
      +beatles +'Let It Be' means that the only word "beatles" must be present, while words "let", "it", and "be" can but need not be present.
-->

<html>
<head>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Zoekwoorden:<br><input name="zoekveld" type="text" size="80"> 
        <br><br>
        Omgeving:<br> <select name="omgeving">
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
        <br><br>
        Duur:<br> <select name="duur">
                    <option value="alles">Selecteer...</option>
                    <option value="6 maanden">6 maanden</option>
                    <option value="1 jaar">1 jaar</option>
                    <option value="2 jaar">2 jaar</option>
                    <option value="Anders">Anders</option>
                </select>
        <br><br>
        Opleiding:<br> <select name="opleiding">
                    <option value="alles">Selecteer...</option>
                    <option value="Informatica">WO - Informatica</option>
                    <option value="Informatiekunde">WO - Informatiekunde</option>
                    <option value="Informatie, Multimedia, Management">WO - Informatie, Multimedia, Management</option>
                    <option value="Medische Informatiekunde">WO - Medische Informatiekunde</option>
                    <option value="Kunstmatige Intelligentie">WO - Kunstmatige Intelligentie</option>
                    <option value="Anders">Anders</option>
                </select>
        <br><br>
        <input name="zoeken" type="submit" value="Zoeken">
        <br><br>
    </form>
</body>
</html>

<?php

if( isset($_POST['zoekveld']) && isset($_POST['omgeving']) && isset($_POST['duur']) && isset($_POST['opleiding']) ){
    // Connect to database    
    try {
        $db = new PDO('mysql:host=localhost;dbname=webperen;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch(PDOException $ex) {
        echo "An error occured!"; //user friendly message
    }
    
    // Create search output  
    $zoekveld = preg_replace('#[^a-z 0-9?!]#i', '', $_POST['zoekveld']);
    
    $sqlquery= "";
    $count_zoekfilters = 0;
    
    //////////////////// ZOEKFILTERS ////////////////////
    
    //// OMGEVING ////
    if ($_POST['omgeving'] != "alles") {
        
        /* MAAK query deel */
        $query_omgeving = "locatie='" . $_POST['omgeving'] ."'";
        
        /* ADD query deel to SQLQUERY */
        if ($sqlquery == ""){
            $sqlquery = "WHERE " . $query_omgeving;
        } else {
            $sqlquery .= " AND " . $query_omgeving;
        }
    
        /* COUNT zoekfilters */
        $count_zoekfilters += 1;
    }
    //////////////////
    
    //// DUUR ////
    if ($_POST['duur'] != "alles") {
        
        /* MAAK query deel */
        $query_duur = "duur='" . $_POST['duur'] ."'";
        
        /* ADD query deel to SQLQUERY */
        if ($sqlquery == ""){
            $sqlquery = "WHERE " . $query_duur;
        } else {
            $sqlquery .= " AND " . $query_duur;
        }
    
        /* COUNT zoekfilters */
        $count_zoekfilters += 1;
    }
    //////////////////
    
    //// OPLEIDING ////
    if ($_POST['opleiding'] != "alles") {
        
        /* MAAK query deel */
        $query_opleiding = "opleidingen LIKE '%" . $_POST['opleiding'] ."%'";
        
        /* ADD query deel to SQLQUERY */
        if ($sqlquery == ""){
            $sqlquery = "WHERE " . $query_opleiding;
        } else {
            $sqlquery .= " AND " . $query_opleiding;
        }
    
        /* COUNT zoekfilters */
        $count_zoekfilters += 1;
    }
    //////////////////
    
    //// ZOEKVELD ////
    if ($zoekveld != "") {
        
        /* MAAK query deel */
        $query_zoekveld = "MATCH (titel, locatie, opleidingen, tags, beschrijving_aanbod, beschrijving_eisen, beschrijving_overige) AGAINST ('".$zoekveld."' IN BOOLEAN MODE)";
        
        /* ADD query deel to SQLQUERY */
        if ($sqlquery == ""){
            $sqlquery = "WHERE " . $query_zoekveld;
        } else {
            $sqlquery .= " AND " . $query_zoekveld;
        }
        
        /* COUNT zoekfilters */
        $count_zoekfilters += 1;
    }
    //////////////////
    
    $stmt = $db->prepare("SELECT titel FROM vacatures " . $sqlquery . " LIMIT 50");
    $stmt->execute(array(':query' => $query));
    $stmt->execute();
    $row_count = $stmt->rowCount();
    
    /* Als alles leeg is */
    if (($zoekveld == "") && ($_POST['omgeving'] == "alles") && ($_POST['duur'] == "alles") && ($_POST['opleiding'] == "alles")) {
        $zoekresultaat = 'Je hebt helemaal geen zoekfilters ingevuld! Probeer het opnieuw.' ;   
    } 
    /* Als er resultaten zijn */
    elseif ($row_count > 0) {
        $zoekresultaat = $row_count . ' resultaten gevonden voor "' . $zoekveld . '" en "' . $_POST['omgeving'] . '" en "' . $_POST['duur'] . '" en "' . $_POST['opleiding'] . '".<br>';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $zoekresultaat .= $row['titel'].'<br>';
        } 
    } 
    /* Als er geen resultaten zijn */
    else {
        $zoekresultaat = '0 resulaten gevonden voor "' . $zoekveld . '" en "' . $_POST['omgeving'] . '" en "' . $_POST['duur'] . '" en "' . $_POST['opleiding'] . '".' ;   
    }
    
    echo $zoekresultaat;
}

?>