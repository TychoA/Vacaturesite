<?php
if(isset($_POST['email'])) { 
    $name = strip_tags($_POST['naam']);
    $from = strip_tags($_POST['email']); 
    $subject = strip_tags($_POST['onderwerp']);
    $question = strip_tags($_POST['vraag']); 
 
    // Check for errors
    $error_message = "";
    
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp,$from)) {
        $error_message .= '- Het ingevulde e-mailadres is niet geldig.<br />';
    }
    if(strlen($question) < 5) {
        $error_message .= '- Het bericht moet uit minimaal 5 tekens bestaan.<br />';
    }
 
    // Display error message
    if ($error_message != "") {
        $notification = "Het spijt ons, maar er zijn fouten gevonden in de gegevens die u probeerde te versturen:<br /><br />";
        $notification .= $error_message."<br />";
        $notification .= "Probeert u het alstublieft opnieuw.";
    } else {
    // Create email message
        $email_message  = "Bericht van ".$name." via het contactformulier van StagePeer.nl.\n\n";
        $email_message .= "Naam: ".$name." (".$from.")\n"; 
        $email_message .= "Onderwerp: ".$subject."\n\n";
        $email_message .= "---------------------------------------------------\n\n";
        $email_message .= $question;

    // Send mail  
        $header = 'From: Contactformulier';
        $to = "stagepeer@gmail.com";
        $subject_email = "Bericht contactformulier StagePeer.nl";
        
        if (mail('stagepeer@gmail.com', $subject_email, $email_message, $header)) {
            $notification = "Uw bericht is succesvol verstuurd! Wij nemen zo snel mogelijk contact met u op.";
        }
    }
}
    
?>

    <!-- HEADER AREA -->
    <?php include './linking.php';?>
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
                <a id="formulier"><h2>Stuur ons een bericht</h2></a>
                <?php if (isset($notification)) { echo "<p class='message_send'>".$notification."</p>";} ?>
                <form class="contact_formulier" action="<?php echo $_SERVER['PHP_SELF']."#formulier"; ?>" method="post">
                    <h4>Naam</h4> <input type=text name="naam" placeholder="Typ hier uw naam..." required>
                    <h4>E-mail</h4> <input type=text name="email" placeholder="Typ hier uw e-mailadres..." required>
                    <h4>Onderwerp</h4> <input type=text name="onderwerp" placeholder="Onderwerp..." reqiored>
                    <h4>Vraag</h4> <textarea name="vraag" rows="10" cols="30"placeholder="Vraag..." required></textarea>
                    
                    <input id="submit" type="submit" value="Verstuur"> 
                </form>
            </div>
            
    </main>

    <!-- MAIN AREA -->

    <!-- FOOTER AREA -->
    <?php include './includes/footer.php';?>
    <!-- /FOOTER AREA -->