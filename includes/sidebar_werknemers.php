<?php 
    include '../includes/connect.php';
    if (!isset($_SESSION)) {
        session_start();  
    }

    $userID = $_SESSION['werknemerid']; //UserID moet al bekend zijn.
    $aantalNieuweBerichten = 0;
    $sql = "SELECT *
            FROM verstuurd_werkgever 
            INNER JOIN werkgevers
            ON werkgevers.ID = verstuurd_werkgever.ID_werkgever 
            AND verstuurd_werkgever.ID_werknemer=".$userID."
            AND verstuurd_werkgever.gelezen=0";

    $results = $db->query($sql);
    foreach($results as $row) 
    { 
        $aantalNieuweBerichten++;
    }
?>
   

<sidebar>
    <img class="face" src="../img/me.png" alt="Naam Voornaam" /> 
    
    <nav class="nav_sidebar">
        <div class="sidebar_element_fist">Jaap Verhoeven</div>
        
        <a class="sidebar_element" href="<?php echo $mijn_profiel; ?>">
            <i class="fa fa-user fa-fw fa-lg"></i>Mijn Profiel
        </a>
            
        <a class="sidebar_element" href="<?php echo $favorieten; ?>">
            <i class="fa fa-heart fa-fw fa-lg"></i>Favorieten
        </a>
            
        <a class="sidebar_element" href="<?php echo $berichten; ?>">
            <i class="fa fa-envelope fa-fw fa-lg"></i><span id="unread"><?php echo $aantalNieuweBerichten ?> ongelezen bericht(en)</span>
        </a>
            
        <a class="sidebar_element" href="<?php echo $instellingen; ?>">
            <i class="fa fa-cogs fa-fw fa-lg"></i>Wachtwoord aanpassen
        </a>
        
        <div class="sidebar_element_last">
            <a href="<?php echo $uitloggen; ?>">Uitloggen</a> 
            &#8226; 
            <a href="<?php echo $profiel_deactiveren; ?>">Profiel Deactiveren</a></div>
    </nav>
</sidebar>

