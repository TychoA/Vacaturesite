<html>
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include '../includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_account; ?>">Mijn Account</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werknemers.php';?>
            
        <main>
            <div class="blok_search full">
                <h2>Zoeken naar vacatures</h2>
                
                <form>
                    <input id="zoekwoorden" type="text" name="zoekwoorden" placeholder="Typ hier zoektermen...">
                    <br>
                    <span>Studierichting:</span>
                    <select name="studierichting">
											<option value="in">WO - Informatica</option>
                      <option value="ik">WO - Informatiekunde</option>
                      <option value="mi">WO - Medische Informatiekunde</option>
                      <option value="imm">WO - Informatie, Multimedia, Management</option>
                      <option value="ki">WO - Kunstmatige Intelligentie</option>
										</select>
                    <br>
                    <span>Duur van stage:</span>
                    <input id="duur" type="radio" name="duur" value="half" checked> 0,5 jaar
                    <input id="duur" type="radio" name="duur" value="heel"> 1 jaar
                    <input id="duur" type="radio" name="duur" value="dubbel"> 2 jaar
                    <input id="submit" type="submit" value="Zoeken">
                </form>
            </div>
                
            <div class="blok_left">
                <h2>Jouw Matches</h2>
            
                <div class="vac_mini">
                    <h4>Titel vacature</h4>
                    <p class="vac_mini_info">Naam bedrijf | Locatie | Duur</p>
                    <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                </div>
                    
                <div class="vac_mini">
                    <h4>Titel vacature</h4>
                    <p class="vac_mini_info">Naam bedrijf | Locatie | Duur</p>
                    <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                </div>
                    
                <div class="vac_mini">
                    <h4>Titel vacature</h4>
                    <p class="vac_mini_info">Naam bedrijf | Locatie | Duur</p>
                    <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                </div>       
            </div>
                
            <div class="blok_right">
                <h2>Recent bekeken</h2>
                
                <div class="vac_mini">
                    <h4>Titel vacature</h4>
                    <p class="vac_mini_info">Naam bedrijf | Locatie | Duur</p>
                    <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                </div>
                <div class="vac_mini">
                    <h4>Titel vacature</h4>
                    <p class="vac_mini_info">Naam bedrijf | Locatie | Duur</p>
                    <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                </div>
                <div class="vac_mini">
                    <h4>Titel vacature</h4>
                    <p class="vac_mini_info">Naam bedrijf | Locatie | Duur</p>
                    <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                </div>
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>