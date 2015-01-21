<?php session_start(); ?>
<html>
    
    <?php // include './includes/connect.php';?>
    
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include './includes/header.php';?>
            
        <div class="sub_menu_home"></div>    
    </header>
    <!-- /HEADER AREA -->

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
            
            
        </div> 
    </main>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
<?php echo $_SESSION['werknemerid']; ?>
    
</body>
    
</html>