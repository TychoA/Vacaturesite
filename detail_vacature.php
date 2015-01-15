<html>
    
    <!-- DATA BASE CONNECTIE -->
    <?php        
        try {
            $db = new PDO('mysql:host=localhost;dbname=stagepeer;charset=utf8',
                'luca', 'fez7cJpE');
        } catch(PDOException $ex) {
            die("Something went wrong while connecting to the database!");
        }

        $stmt = $db->prepare('SELECT vacatures.ID_werkgevers, werkgevers.ID, werkgevers.naam, werkgevers.url_foto, datum, duur, opleidingen, locatie, foto, titel, beschrijving_aanbod, beschrijving_eisen, beschrijving_overige, tags  FROM vacatures INNER JOIN werkgevers ON ID_werkgevers=werkgevers.ID WHERE vacatures.ID=1');
        $stmt->execute(array());
        $stmt->execute();
 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vac_id_wg = $row["ID_werkgevers"];
            $vac_naam_wg = $row["naam"];
            $vac_datum = strtotime($row['datum']);
            $vac_datum_2 = date("m/d/y",$vac_datum);
            $vac_duur = $row["duur"];
            $vac_opleidingen = $row["opleidingen"];
            $vac_locatie = $row["locatie"];
            $vac_foto = $row["foto"];
            $vac_url_foto = $row["url_foto"];
            $vac_titel = $row["titel"];
            $vac_beschrijving_aanbod = $row["beschrijving_aanbod"];
            $vac_beschrijving_eisen = $row["beschrijving_eisen"];
            $vac_beschrijving_overig = $row["beschrijving_overige"];
            $vac_tags = $row["tags"];
        }
    ?>
    
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include './includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $zoekresultaten; ?>">Zoekresultaten</a>
                <span class="dash">/</span>
                <a href="<?php echo $detail_vacature; ?>">Vacature</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <main class="no_top_padding">
        <div class="wrapper">  
            <!-- Search Bar -->
            <form id="searchbar" class="searchbar" action="<?php echo $zoekresultaten; ?>#searchbar" method="post">
                
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
            
            <p class="back back_zoekresultaten">
                <a href="<?php echo $zoekresultaten; ?>">
                    <i class="fa fa-chevron-left">  </i>Terug naar overzicht met zoekresultaten
                </a>
            </p>
            
            <h1><?php echo $vac_titel; ?></h1>
            <p class="date_added">Geplaatst op <?php echo $vac_datum_2; ?></p>
            
            <div class="full alg_informatie">
                <h2>Algemene informatie</h2>
                
                <?php if ($vac_foto == 1) {
                    echo "<img src=".$vac_url_foto." alt='".$vac_naam_wg."' />";
                }?>
                <h4>Bedrijf</h4><p><?php echo $vac_naam_wg; ?></p><br>
                <h4>Duur</h4><p><?php echo $vac_duur; ?></p><br>
                <h4>Opleidingen</h4><p><?php echo $vac_opleidingen; ?></p><br>
                <h4>Locatie</h4><p><?php echo $vac_locatie; ?></p><br>
                <h4>Tags</h4><p><?php echo $vac_tags; ?></p><br>
                
                <div class="clear"></div>
            </div>
            
            <div class="full beschrijving">
                <div class="aanbieding">
                    <h2>Wat wordt er aangeboden</h2>
                    <p><?php echo $vac_beschrijving_aanbod; ?></p>
                </div>
                    
                <div class="eisen">
                    <h2>De eisen</h2>
                    <p><?php echo $vac_beschrijving_eisen; ?></p>
                </div>
                
                <div class="overig">
                    <h2>Overige informatie</h2>
                    <p><?php echo $vac_beschrijving_overig; ?></p>
                </div>
                    
                <div class="reageren">
                    Reageer nu op deze vacature
                </div>
            </div>
        </div>
    </main>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>