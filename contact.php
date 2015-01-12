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
                <a href="<?php echo $contact; ?>">Contact</a>
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
            <h1>Contact</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38990.08729484704!2d4.955359500000013!3d52.35445340000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c60944f3f79169%3A0x2ea457d2a7bb2226!2sScience+Park+904%2C+University+of+Amsterdam%2C+1098+XH+Amsterdam!5e0!3m2!1sen!2snl!4v1420846325660" width="960" height="300" frameborder="0" style="border:0"></iframe><br><br>
            
            <div class="col_2">
                <h2><span class="tomato">Stage</span>Peer</h2>
                <p>StagePeer is ontwikkeld door WebPeren, vijf Informatiekunde studenten van de Universiteit van Amsterdam.</p>
                <p>Science Park 904, Amsterdam<br>
                info@stagepeer.nl<br>
                (+31) 20 000 0000</p>
            </div>
            
            <div class="col_2">
                <h2>Stuur ons een bericht</h2>
                <form class="contact_formulier">
                    <h4>Gebruikersnaam</h4> <input type=text name="gebruikersnaam" placeholder="Typ hier uw gebruikersnaam...">
                    <h4>Onderwerp</h4> <input type=text name="email" placeholder="Typ hier uw e-mailadres..." >
                    <h4>Vraag</h4> <textarea name="vraag" rows="10" cols="30"placeholder="Typ hier uw vraag..."></textarea>
                    
                    <input id="submit" type="submit" value="Verstuur"> 
                </form>
            </div>
            
    </main>

    <!-- MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->
</html>