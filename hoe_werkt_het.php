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
                <a href="<?php echo $hoe_werkt_het; ?>">Hoe werkt het?</a>
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
          <h1>Hoe werkt het?</h1>
            
        </div>
    </main>

    <!-- MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
</html>