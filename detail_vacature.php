<html>
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
            
            <h1>Titel vacature</h1>
            <p class="date_added">Geplaatst op 01/01/'15</p>
            
            <div class="full">
                
                <div class="aanbieding">
                    <h2>Wat wordt er aangeboden</h2>
                    <h3>Tussenkop</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p>
                    <h3>Tussenkop</h3>
                    <p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.</p>
                </div>
                    
                <div class="eisen">
                    <h2>De eisen</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p>
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