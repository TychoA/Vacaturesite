<html>
    
    <!-- DATA BASE CONNECTIE -->
    <?php        
        try {
            $db = new PDO('mysql:host=localhost;dbname=stagepeer;charset=utf8',
                'luca', 'fez7cJpE');
        } catch(PDOException $ex) {
            die("Something went wrong while connecting to the database!");
        }

        $stmt = $db->query('SELECT * FROM vacatures');
 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vac_id_wg = $row["ID_werkgevers"];
            $vac_datum = strtotime($row['datum']);
            $vac_datum_2 = date("m/d/y",$vac_datum);
            $vac_duur = $row["duur"];
            $vac_opleidingen = $row["opleidingen"];
            $vac_locatie = $row["locatie"];
            $vac_foto = $row["foto"];
            $vac_titel = $row["titel"];
            $vac_beschrijving_aanbod = $row["beschrijving_aanbod"];
            $vac_beschrijving_eisen = $row["beschrijving_eisen"];
            $vac_beschrijving_overig = $row["beschrijving_overige"];
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
            <form class="searchbar">
                <p>Zoeken: </p> 
                <input class="search" type="search" name="search" placeholder="Typ hier uw zoekopdracht.."/>
                
                <p>Opleiding: </p>
                <input class="opleiding" type="search" name="opleiding" placeholder="Typ hier uw opleiding.."/>
                    
                <p>Selecteer een periode: </p>
                <select class="tijd" name="Periode">
                    <option>Selecteer..</option>
                    <option>0.5 jaar</option>
                    <option>1 jaar</option>
                    <option>2 jaar</option>
                    <option>...</option>
                </select>  
                    
                <p>Selecteer een stad: </p>
                <select class="stad" name="Stad">
                    <option>Selecteer..</option>
                    <option>Amsterdam</option>
                    <option>Rotterdam</option>
                    <option>Utrecht</option>
                    <option>...</option>
                </select>
            </form>
            
            <p class="back back_zoekresultaten">
                <a href="<?php echo $zoekresultaten; ?>">
                    <i class="fa fa-chevron-left">  </i>Terug naar overzicht met zoekresultaten
                </a>
            </p>
            
            <h1><?php echo $vac_titel; ?></h1>
            <p class="date_added">Geplaatst op <?php echo $vac_datum_2; ?></p>
            
            <div class="full">
                
                <div class="alg_info">
                    <h2>Algemene informatie</h2>
                    <h4>Duur</h4><p><?php echo $vac_duur; ?></p>
                    <h4>Opleidingen</h4><p><?php echo $vac_opleidingen; ?></p>
                    <h4>Locatie</h4><p><?php echo $vac_locatie; ?></p>
                    <h4>Tags</h4><p><?php echo $vac_tags; ?></p>
                </div>
                
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