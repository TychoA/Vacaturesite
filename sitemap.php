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

    <!-- MAIN AREA -->
    <main>
        <div class="wrapper">
            <h1>Sitemap</h1>
            <h2>Algemeen</h2>
            <p><a href="<?php echo $home; ?>">&#187; Home</a></p>
            <p><a href="<?php echo $hoe_werkt_het; ?>">&#187; Hoe werkt het?</a></p>
            <p><a href="<?php echo $home; ?>">&#187; Zoek vacature</a></p>
            <p><a href="<?php echo $contact; ?>">&#187; Contact</a></p>
            
            <h2>Account</h2>
            <p><a href="<?php echo $mijn_account; ?>">&#187; Overzicht</a></p>
            <p><a href="<?php echo $mijn_profiel; ?>">&#187; Mijn Profiel</a></p>
            <p><a href="<?php echo $berichten; ?>">&#187; Mijn Berichten</a></p>
            <p><a href="<?php echo $instellingen; ?>">&#187; Instellingen</a></p>
            
            <h2>Overig</h2>
            <p><a href="<?php echo $alg_voorwaarden; ?>">&#187; Algemene voorwaarden</a></p>
            <p><a href="<?php echo $privacy_beleid; ?>">&#187; Privacy beleid</a></p>
            <p><a href="<?php echo $sitemap; ?>">&#187; Sitemap</a></p>
        </div>
    </main>
    <!-- MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
</html>