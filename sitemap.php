<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <link rel="stylesheet" href="footer_pages.css" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include './includes/header.php';?>
            
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $sitemap; ?>">Sitemap</a>
            </div>
        </div>    
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
    <main>
        <div class="wrapper">
            <h1>Sitemap</h1>
            <h2>Algemeen</h2>
            <p><a href="<?php echo $home; ?>"><i class="fa fa-chevron-right fa-fw"></i>Home</a></p>
            <p><a href="<?php echo $hoe_werkt_het; ?>"><i class="fa fa-chevron-right fa-fw"></i>Hoe werkt het?</a></p>
            <p><a href="<?php echo $home; ?>"><i class="fa fa-chevron-right fa-fw"></i>Zoek vacature</a></p>
            <p><a href="<?php echo $contact; ?>"><i class="fa fa-chevron-right fa-fw"></i>Contact</a></p>
            
            <!--<h2>Mijn Account - Werkgever</h2>
            <p><a href="#"><i class="fa fa-chevron-right fa-fw"></i>Overzicht</a></p>
            <p><a href="#"><i class="fa fa-chevron-right fa-fw"></i>Profiel</a></p>
            <p><a href="#"><i class="fa fa-chevron-right fa-fw"></i>Nieuwe vacature toevoegen</a></p>
            <p><a href="#"><i class="fa fa-chevron-right fa-fw"></i>Openstaande vacatures</a></p>
            <p><a href="#"><i class="fa fa-chevron-right fa-fw"></i>Gesloten vacatures</a></p>
            <p><a href="#"><i class="fa fa-chevron-right fa-fw"></i>Mijn Berichten</a></p>
            <p><a href="#"><i class="fa fa-chevron-right fa-fw"></i>Instellingen</a></p>-->
            
            <h2>Mijn Account</h2>
            <p><a href="<?php echo $mijn_account; ?>"><i class="fa fa-chevron-right fa-fw"></i>Overzicht</a></p>
            <p><a href="<?php echo $mijn_profiel; ?>"><i class="fa fa-chevron-right fa-fw"></i>Mijn Profiel</a></p>
            <p><a href="<?php echo $favorieten; ?>"><i class="fa fa-chevron-right fa-fw"></i>Mijn Favorieten</a></p>
            <p><a href="<?php echo $berichten; ?>"><i class="fa fa-chevron-right fa-fw"></i>Mijn Berichten</a></p>
            <p><a href="<?php echo $instellingen; ?>"><i class="fa fa-chevron-right fa-fw"></i>Instellingen</a></p>
            
            <h2>Overig</h2>
            <p><a href="<?php echo $alg_voorwaarden; ?>"><i class="fa fa-chevron-right fa-fw"></i>Algemene voorwaarden</a></p>
            <p><a href="<?php echo $privacy_beleid; ?>"><i class="fa fa-chevron-right fa-fw"></i>Privacy beleid</a></p>
            <p><a href="<?php echo $sitemap; ?>"><i class="fa fa-chevron-right fa-fw"></i>Sitemap</a></p>
        </div>
    </main>
    <!-- MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
</html>