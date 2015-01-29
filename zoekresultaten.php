<?php session_start(); ?>
<html>

    <?php include './includes/connect.php';?>
    
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include './includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $zoekresultaten; ?>">Zoekresultaten</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <main class="no_top_padding">
        <div class="wrapper">  
            <!-- Search Bar -->
            <form id="searchbar" class="searchbar" action="<?php echo $_SERVER['PHP_SELF'].'#searchbar'; ?>" method="post">
                
                <p>Omgeving: </p>
                <select class="filters" name="omgeving">
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
                
                <p>Periode: </p>
                <select class="filters" name="duur">
                    <option value="alles">Selecteer...</option>
                    <option value="6 maanden">6 maanden</option>
                    <option value="1 jaar">1 jaar</option>
                    <option value="2 jaar">2 jaar</option>
                    <option value="Anders">Anders</option>
                </select> 
                
                <p>Studierichting: </p>
                <select class="filters" name="opleiding">
                    <option value="alles">Selecteer...</option>
                    <option value="Informatica">WO - Informatica</option>
                    <option value="Informatiekunde">WO - Informatiekunde</option>
                    <option value="Informatie, Multimedia, Management">WO - Informatie, Multimedia, Management</option>
                    <option value="Medische Informatiekunde">WO - Medische Informatiekunde</option>
                    <option value="Kunstmatige Intelligentie">WO - Kunstmatige Intelligentie</option>
                    <option value="Anders">Anders</option>
                </select>

                <br><p>Zoekenwoorden: </p> 
                <input class="search" name="zoekveld" type="text" placeholder="Typ hier uw zoekwoorden..">
                
                <input class="submit" name="zoeken" type="submit" value="Zoeken">
            </form>
            
            <h2>Zoekresultaten</h2>
            
            <div class="resultaten">
                
            <?php 

            if( isset($_POST['zoekveld']) && isset($_POST['omgeving']) && isset($_POST['duur']) && isset($_POST['opleiding']) ){
                // Create search output  
                $zoekveld = preg_replace('#[^a-z 0-9?!]#i', '', $_POST['zoekveld']);

                $sqlquery= "";
                $sqlarray = array();
                
                $info_resultaten = "";
                    

                //////////////////// ZOEKFILTERS ////////////////////

                //// OMGEVING ////
                if ($_POST['omgeving'] != "alles") {

                    /* MAAK query deel */
                    $query_omgeving = "vacatures.locatie=:omgeving OR vacatures.locatie='alles'";
                    
                    /* ADD query deel to SQLQUERY */
                    if ($sqlquery == ""){
                        $sqlquery = "WHERE " . $query_omgeving;
                    } else {
                        $sqlquery .= " AND " . $query_omgeving;
                    }
                    
                    /* ADD variabele SQLARRAY */
                    $sqlarray[':omgeving'] = $_POST['omgeving'];

                    /* Info resultaten */
                    if ($info_resultaten == ""){
                        $info_resultaten = $_POST['omgeving'];
                    } else {
                        $info_resultaten .= " / " . $_POST['omgeving'];
                    }
                }
                //////////////////

                //// DUUR ////
                if ($_POST['duur'] != "alles") {

                    /* MAAK query deel */
                    $query_duur = "duur=:duur";

                    /* ADD query deel to SQLQUERY */
                    if ($sqlquery == ""){
                        $sqlquery = "WHERE " . $query_duur;
                    } else {
                        $sqlquery .= " AND " . $query_duur;
                    }
                    
                    /* ADD variabele SQLARRAY */
                    $sqlarray[':duur'] = $_POST['duur'];

                    /* Info resultaten */
                    if ($info_resultaten == ""){
                        $info_resultaten = $_POST['duur'];
                    } else {
                        $info_resultaten .= " / " . $_POST['duur'];
                    }
                }
                //////////////////

                //// OPLEIDING ////
                if ($_POST['opleiding'] != "alles") {

                    /* MAAK query deel */
                    $query_opleiding = "opleidingen='alles' OR opleidingen LIKE :opleiding";

                    /* ADD query deel to SQLQUERY */
                    if ($sqlquery == ""){
                        $sqlquery = "WHERE " . $query_opleiding;
                    } else {
                        $sqlquery .= " AND " . $query_opleiding;
                    }
                    
                    /* ADD variabele SQLARRAY */
                    $sqlarray[':opleiding'] = "%".$_POST['opleiding']."%";

                    /* Info resultaten */
                    if ($info_resultaten == ""){
                        $info_resultaten = $_POST['opleiding'];
                    } else {
                        $info_resultaten .= " / " . $_POST['opleiding'];
                    }
                }
                //////////////////

                //// ZOEKVELD ////
                if ($zoekveld != "") {

                    /* MAAK query deel */
                    $query_zoekveld = "MATCH (titel, vacatures.locatie, opleidingen, tags, beschrijving_aanbod, beschrijving_eisen, beschrijving_overige) AGAINST (:zoekveld IN BOOLEAN MODE)";

                    /* ADD query deel to SQLQUERY */
                    if ($sqlquery == ""){
                        $sqlquery = "WHERE " . $query_zoekveld;
                    } else {
                        $sqlquery .= " AND " . $query_zoekveld;
                    }
                    
                    /* ADD variabele SQLARRAY */
                    $sqlarray[':zoekveld'] = "'".$zoekveld."'";


                    /* Info resultaten */
                    if ($info_resultaten == ""){
                        $info_resultaten = '"' . $zoekveld . '"';
                    } else {
                        $info_resultaten .= ' / "' . $zoekveld . '"';
                    }
                }
                //////////////////

                $stmt = $db->prepare("SELECT vacatures.ID, ID_werkgevers, datum, duur, vacatures.locatie, foto, titel, beschrijving_aanbod, werkgevers.ID, werkgevers.naam, werkgevers.url_foto FROM vacatures JOIN werkgevers ON vacatures.ID_werkgevers = werkgevers.ID " . $sqlquery . " LIMIT 50");
                $stmt->execute($sqlarray);
                $stmt->execute();
                $row_count = $stmt->rowCount();

                /* Als alle zoekvelden en filters leeg zijn */
                if (($zoekveld == "") && ($_POST['omgeving'] == "alles") && ($_POST['duur'] == "alles") && ($_POST['opleiding'] == "alles")) {
                    echo '<p class="info">Je hebt helemaal geen zoekfilters ingevuld!  Probeer het opnieuw.</p>' ;   
                } 
                
                /* Als er één resultaten is */
                elseif ($row_count == 1) {
                    echo '<p class="info">Er is ' . $row_count . ' resultaat gevonden voor ' . $info_resultaten . '.</p>';
                    
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $res_timestamp = strtotime($row['datum']);
                        $datum = date("d/m/y",$res_timestamp);
                        $tijd = date("H:i",$res_timestamp);

                        $res_beschr = mb_substr($row["beschrijving_aanbod"], 0, 140);
                
                        echo "<a href=".$detail_vacature."?id=".$row["ID"].">";
                        echo    "<div class='vac_mini'>";
                                    if($row["foto"]==1){ 
                        echo            "<img src=".$row['url_foto']." alt=".$row['naam']."/>"; 
                                    }
                        echo        "<h4>".$row["titel"]."</h4>";
                        echo        "<p class='vac_mini_info'>".$row["locatie"]." | periode: ".$row["duur"]." | ".$datum." ".$tijd."</p>";
                        echo        "<p class='vac_mini_beschr'>".$res_beschr."...</p>";
                        echo    "</div>";        
                        echo "</a>";    

                    } 
                } 
                
                /* Als er resultaten zijn */
                elseif ($row_count > 1) {
                    echo '<p class="info">Er zijn ' . $row_count . ' resultaten gevonden voor ' . $info_resultaten . '.</p>';
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $res_timestamp = strtotime($row['datum']);
                        $datum = date("d/m/y",$res_timestamp);
                        $tijd = date("H:i",$res_timestamp);

                        $res_beschr = mb_substr($row["beschrijving_aanbod"], 0, 140);
                
                        echo "<a href=".$detail_vacature."?id=".$row["ID"].">";
                        echo    "<div class='vac_mini'>";
                                    if($row["foto"]==1){ 
                        echo            "<img src=".$row['url_foto']." alt=".$row['naam']."/>"; 
                                    }
                        echo        "<h4>".$row["titel"]."</h4>";
                        echo        "<p class='vac_mini_info'>".$row["locatie"]." | periode: ".$row["duur"]." | ".$datum." ".$tijd."</p>";
                        echo        "<p class='vac_mini_beschr'>".$res_beschr."...</p>";
                        echo    "</div>";        
                        echo "</a>";    

                    }  
                } 
                /* Als er geen resultaten zijn */
                else {
                    echo '<p class="info">Er zijn ' . $row_count . ' resultaten gevonden voor ' . $info_resultaten . '.</p>';
                }
            }

?>
                
                <div class="clear"></div>
            </div>
            
        </div>
    </main>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>