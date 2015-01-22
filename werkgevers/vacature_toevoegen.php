<?php session_start();

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid']))) {
    $bedrijfID = $_SESSION['werkgeverid'];
} else {
    header ( 'Location:../login_pagina.php');
}

?>
<html>
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include '../includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_account; ?>">Mijn Account</a>
                <span class="dash">/</span>
                <a href="<?php echo $vacature_toevoegen; ?>">Vacature toevoegen</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werkgevers.php';?>
            
        <main>
           <h1>Vacature toevoegen</h1>
            <p class="back">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
            </p>
            <form>    
		            <div class="full vac_toevoegen">
		                <h2>Informatie</h2>
		                
		                <h4>Titel</h4><input type="text" name="titel" placeholder="..." />
		                		
		                <h4>Duur van stage</h4>
		                <input id="duur" type="radio" name="duur" value="half" checked > <span id="duur_tag">0,5 jaar</span>
		                <input id="duur" type="radio" name="duur" value="heel"> <span id="duur_tag">1 jaar</span>
		                <input id="duur" type="radio" name="duur" value="dubbel"> <span id="duur_tag">2 jaar</span> 
		                		
		                <h4>Locatie</h4><input type="text" name="locatie" placeholder="..." />
		                		
		                <h4>Studies</h4>
		                <select id="studierichting" name="studierichting">
												<option value="in">WO - Informatica</option>
		                		<option value="ik">WO - Informatiekunde</option>
		                    <option value="mi">WO - Medische Informatiekunde</option>
		                    <option value="imm">WO - Informatie, Multimedia, Management</option>
		                    <option value="ki">WO - Kunstmatige Intelligentie</option>
										</select>
		                    
		                <h4>Bedrijfslogo weergeven</h4>
		                <input id="logo" type="radio" name="logo" value="ja" checked > <span id="logo_tag">Ja</span>
		                <input id="logo" type="radio" name="logo" value="nee"> <span id="logo_tag">Nee</span>
		                   
		            </div>
		            <div class="full vac_toevoegen_textareas">
		                <h2>Beschrijving</h2>
		                <h4>Wat wordt er aangeboden</h4>
		                <textarea name="aangeboden"></textarea>
		                <h4>De eisen</h4>
		                <textarea name="eisen"></textarea>
		                <h4>Overig</h4>
		                <textarea name="overig"></textarea>
		            </div>
		            
		            <div class="full vac_toevoegen">
		            	<input id="toevoegen" type="submit" name="submit" value="Vacature toevoegen">
		          	</div>
          </form>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>