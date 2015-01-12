<html>
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
            
            <h2>Zoekresultaten</h2>
            
            <!-- LEFT RESULT TAB -->
            <div class="row_left">
                <a href="<?php echo $detail_vacature; ?>">
                    <div class="vac_mini">
                        <div id="image"></div>   
                        <h4>Titel vacature</h4>
                        <p class="vac_mini_info">Locatie | Duur | Geplaatst op 01-01-2015</p>
                        <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                    </div> 
                </a>
                
                <a href="<?php echo $detail_vacature; ?>">
                    <div class="vac_mini">   
                        <h4>Titel vacature</h4>
                        <p class="vac_mini_info">Locatie | Duur | Geplaatst op 01-01-2015</p>
                        <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                    </div> 
                </a>
                
                <a href="<?php echo $detail_vacature; ?>">
                    <div class="vac_mini">
                        <div id="image"></div>   
                        <h4>Titel vacature</h4>
                        <p class="vac_mini_info">Locatie | Duur | Geplaatst op 01-01-2015</p>
                        <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                    </div> 
                </a>
                
                <a href="<?php echo $detail_vacature; ?>">
                    <div class="vac_mini">
                        <div id="image"></div>   
                        <h4>Titel vacature</h4>
                        <p class="vac_mini_info">Locatie | Duur | Geplaatst op 01-01-2015</p>
                        <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                    </div> 
                </a>     
            </div>
                 
            <!-- RIGHT RESULT TAB -->
            <div class="row_right">
                <a href="<?php echo $detail_vacature; ?>">
                    <div class="vac_mini">   
                        <h4>Titel vacature</h4>
                        <p class="vac_mini_info">Locatie | Duur | Geplaatst op 01-01-2015</p>
                        <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                    </div> 
                </a>
                
                <a href="<?php echo $detail_vacature; ?>">
                    <div class="vac_mini">
                        <div id="image"></div>   
                        <h4>Titel vacature</h4>
                        <p class="vac_mini_info">Locatie | Duur | Geplaatst op 01-01-2015</p>
                        <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                    </div> 
                </a>
                
                <a href="<?php echo $detail_vacature; ?>">
                    <div class="vac_mini">
                        <div id="image"></div>   
                        <h4>Titel vacature</h4>
                        <p class="vac_mini_info">Locatie | Duur | Geplaatst op 01-01-2015</p>
                        <p class="vac_mini_beschr">Lorem ipsum dolor sit amet est tu, consectetur adipiscing elit. Quisque hendrerit justo non velit faucibus, acd...</p>
                    </div> 
                </a>
            </div>
            <div class="clear"></div>
        </div>
    </main>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>