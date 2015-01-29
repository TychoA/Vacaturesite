<?php session_start(); 

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
} else {
    header ( 'Location:../login_pagina.php');
}

if ($_GET['kind'] == 'diploma') {
    $kind = "Diploma of certificaat";
} elseif ($_GET['kind'] == 'opleiding') {
    $kind = "Opleiding of cursus";
} else {
    $kind = $_GET['kind'];
}
?>

    <!-- HEADER AREA -->
    <?php include './linking.php';?>
    <?php include '../includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_account; ?>">Mijn Account</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_profiel; ?>">Mijn Profiel</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_profiel; ?>">Toevoegen</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper beheer">  
        <?php include '../includes/sidebar_werknemers.php';?>
            
        <main>
            <h1 class="edit_profile">Mijn Profiel</h1>
            <p class="back">
                <a href="<?php echo $mijn_profiel; ?>">
                    &#171; Terug naar profiel
                </a>
                <a class="openbare_profiel" href="../profiel_werknemer.php?id=<?php echo $userID; ?>" target="_blank">
                    bekijk hier je openbare profiel
                </a>
            </p>
            
            <div class="full">
                <form action="update.php" method="post">
                    <h2><?php echo $kind; ?> toevoegen</h2>
                    
                    <?php if ($_GET['kind'] == 'Skill') { ?>
                        
                        <div class="toevoegen">
                            <h4>Skill</h4>
                            <input type="text" name="naam" placeholder="Bijvoorbeeld 'PHP'" required>
                        </div>
                        
                        <div class="toevoegen">
                            <h4>Vaardigheid</h4>
                            <div class="vaardigheid">
                                <input type="radio" name="vaardigheid" value="5" checked>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                <br>
                                <input type="radio" name="vaardigheid" value="4">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star-o"></span>
                                <br>
                                <input type="radio" name="vaardigheid" value="3">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star-o"></span>
                                    <span class="star-o"></span>
                                <br>
                                <input type="radio" name="vaardigheid" value="2">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star-o"></span>
                                    <span class="star-o"></span>
                                    <span class="star-o"></span>
                                <br>
                                <input type="radio" name="vaardigheid" value="1">
                                    <span class="star"></span>
                                    <span class="star-o"></span>
                                    <span class="star-o"></span>
                                    <span class="star-o"></span>
                                    <span class="star-o"></span>
                            </div>
                        </div>
                    
                        <input id="opslaan" name="skill" type="submit" value="Opslaan">
                    
                    <?php } 
                    if ($_GET['kind'] == 'Taal') { ?>
                    
                        <div class="toevoegen">
                            <h4>Skill</h4>
                            <input type="text" name="naam" placeholder="Bijvoorbeeld 'Engels'" required>
                        </div>
                        
                        <div class="toevoegen">
                            <h4>Vaardigheid</h4>
                            <select class="vaardigheid" name="vaardigheid">
                                <option value="Basisvaardigheid">Basisvaardigheid</option>
                                <option value="Beperkte werkvaardigheid">Beperkte werkvaardigheid</option>
                                <option value="Professionele werkvaardigheid">Professionele werkvaardigheid</option>
                                <option value="Moedertaal of tweetalig">Moedertaal of tweetalig</option>
                            </select> 
                        </div>
                    
                        <input id="opslaan" name="taal" type="submit" value="Opslaan">

                            
                    <?php } 
                    if ($_GET['kind'] == 'diploma') { ?>
                    
                        <div class="toevoegen">
                            <h4>Naam</h4>
                            <input type="text" name="naam" placeholder="Bijvoorbeeld 'VWO diploma'" required>
                        </div>
                        <div class="toevoegen">
                            <h4>Instituut</h4>
                            <input type="text" name="instituut" placeholder="Bijvoorbeeld 'Universiteit van Amsterdam'" required>
                        </div>
                        <div class="toevoegen">
                            <h4>Datum</h4>
                            <input type="text" name="datum" placeholder="Bijvoorbeeld 'september 2014'" required>
                        </div>
                        
                        <div class="toevoegen">
                            <h4>Locatie</h4>
                            <input type="text" name="locatie" placeholder="Bijvoorbeeld 'Amsterdam'" required>
                        </div>
                        
                        <div class="toevoegen">
                            <h4>Beschrijving</h4>
                            <textarea name="beschrijving"></textarea> 
                        </div>
                    
                        <input id="opslaan" name="diploma" type="submit" value="Opslaan">
                    
                    <?php }
                    if ($_GET['kind'] == 'Werkervaring') { ?>
                    
                        <div class="toevoegen">
                            <h4>Functie</h4>
                            <input type="text" name="naam" placeholder="Bijvoorbeeld 'Webdesigner'" required>
                        </div>
                        <div class="toevoegen">
                            <h4>Bedrijf</h4>
                            <input type="text" name="instituut" placeholder="Bijvoorbeeld 'Google'" required>
                        </div>
                        <div class="toevoegen">
                            <h4>Periode</h4>
                            <input type="text" name="datum" placeholder="Bijvoorbeeld 'juni 2012 - heden'" required>
                        </div>
                        
                        <div class="toevoegen">
                            <h4>Locatie</h4>
                            <input type="text" name="locatie" placeholder="Bijvoorbeeld 'Amsterdam'" required>
                        </div>
                        
                        <div class="toevoegen">
                            <h4>Beschrijving</h4>
                            <textarea name="beschrijving"></textarea> 
                        </div>
                    
                        <input id="opslaan" name="werkervaring" type="submit" value="Opslaan">
                    
                    <?php } 
                    if ($_GET['kind'] == 'opleiding') { ?>
                    
                        <div class="toevoegen">
                            <h4>Opleiding</h4>
                            <input type="text" name="naam" placeholder="Bijvoorbeeld 'Informatica'" required>
                        </div>
                        <div class="toevoegen">
                            <h4>Instituut</h4>
                            <input type="text" name="instituut" placeholder="Bijvoorbeeld 'Universiteit van Amsterdam'" required>
                        </div>
                        <div class="toevoegen">
                            <h4>Periode</h4>
                            <input type="text" name="datum" placeholder="Bijvoorbeeld 'juni 2012 - september 2014'" required>
                        </div>
                        
                        <div class="toevoegen">
                            <h4>Locatie</h4>
                            <input type="text" name="locatie" placeholder="Bijvoorbeeld 'Amsterdam'" required>
                        </div>
                        
                        <div class="toevoegen">
                            <h4>Beschrijving</h4>
                            <textarea name="beschrijving"></textarea> 
                        </div>
                    
                        <input id="opslaan" name="opleiding" type="submit" value="Opslaan">
                    
                    <?php } ?>
                    
                        
                </form>
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
    <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->