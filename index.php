<html>
    
    <?php include './includes/database_con.php';?>
    
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include './includes/header.php';?>
            
        <div class="sub_menu_home"></div>    
    </header>
    <!-- /HEADER AREA -->
    
    <!-- INLOG POP-UP -->
    <!--<section class="login_outer">
        <div class="login">
            <i class="fa fa-times"></i>
            <form>
                <h2>Log in</h2>
                <input type="text" class="login_box" placeholder="Gebruikersnaam">
                <input type="text" class="login_box" placeholder="Wachtwoord">  
                <input type="submit" class="login_button" value="Verstuur">
            </form>  
        </div>
    </section>-->
    <!-- /INLOG POP-UP -->

    <!-- MAIN AREA -->
    <main class="no_top_padding">
        <div class="search-area">
            <div class="wrapper">
                <h3>Een prachtige slogan.</h3>
                
                <form action="<?php echo $zoekresultaten.'#searchbar'; ?>" method="post">
                    
                    <div class="search-bar">
                        <input class="search" name="zoekveld" type="text" placeholder="Doorzoek de vacatures.." >

                        <br>

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

                        <p>Studie: </p>
                        <select class="filters" name="opleiding">
                            <option value="alles">Selecteer...</option>
                            <option value="Informatica">WO - Informatica</option>
                            <option value="Informatiekunde">WO - Informatiekunde</option>
                            <option value="Informatie, Multimedia, Management">WO - Informatie, Multimedia, Management</option>
                            <option value="Medische Informatiekunde">WO - Medische Informatiekunde</option>
                            <option value="Kunstmatige Intelligentie">WO - Kunstmatige Intelligentie</option>
                            <option value="Anders">Anders</option>
                        </select>
                    </div>

                    <input class="submit" name="zoeken" type="submit" value="Zoeken">
                </form>
                
            </div>
        </div>
        
        <div class="wrapper nieuwste_vac">
            <h2 class="looks_like_h1">Nieuwste vacatures</h2>
            
            <?php 
            
                $stmt = $db->prepare("SELECT vacatures.ID, ID_werkgevers, datum, duur, locatie, foto, titel, beschrijving_aanbod, werkgevers.ID, werkgevers.naam, werkgevers.url_foto FROM vacatures JOIN werkgevers ON vacatures.ID_werkgevers = werkgevers.ID ORDER BY datum DESC LIMIT 3");
                $stmt->execute();
                $row_count = $stmt->rowCount();

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                    $res_timestamp = strtotime($row['datum']);
                    $datum = date("d/m/y H:i",$res_timestamp);

                    $res_beschr = mb_substr($row["beschrijving_aanbod"], 0, 140);

                    echo "<a href=".$detail_vacature."?id=".$row["ID"].">";
                    echo    "<div class='vac_mini third'>";
                    echo        "<h4>".$row["titel"]."</h4>";
                    echo        "<p class='vac_mini_info'>".$row["naam"]." | ".$row["locatie"]." | ".$datum."</p>";
                    echo        "<p class='vac_mini_beschr'>".$res_beschr."...</p>";
                    echo    "</div>";        
                    echo "</a>";    

                } ?>
        </div> 
    </main>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
</body>
    
</html>