<?php 
    include '../includes/connect.php';
    include '../includes/connect.php';
    if (!isset($_SESSION)) {
        session_start();  
    }
    $bedrijfID = $_SESSION['werkgeverid'];
    $aantalNieuweBerichten = 0;
    $sql = "SELECT *
            FROM verstuurd_werknemer
            INNER JOIN werkgevers
            ON werkgevers.ID = verstuurd_werknemer.ID_werkgever 
            AND verstuurd_werknemer.ID_werkgever=".$bedrijfID."
            AND verstuurd_werknemer.gelezen=0";

    $results = $db->query($sql);
    foreach($results as $row) 
    { 
        $aantalNieuweBerichten++;
    }
?>
   

   
<sidebar>
    <img class="face" src="../img/logo.png" alt="Naam Voornaam" /> 
    <nav class="nav_sidebar">
        <div class="sidebar_element_fist">Naam Bedrijf</div>
        
        <a class="sidebar_element" href="<?php echo $mijn_profiel; ?>">
            <span class="icon-menu-group"></span> Profiel
        </a>
        <a class="sidebar_element" href="<?php echo $vacature_toevoegen; ?>">
            <span class="icon-menu-plus"></span>Nieuwe vacature
        </a>
        <a class="sidebar_element" href="<?php echo $openstaande_vacatures; ?>">
            <span class="icon-menu-bullhorn"></span>Openstaande vacatures
        </a>
        <a class="sidebar_element" href="<?php echo $berichten; ?>">
            <span class="icon-menu-envelope"></span><span id="unread"><?php echo $aantalNieuweBerichten ?> ongelezen bericht(en)</span>
        </a>
        <a class="sidebar_element" href="<?php echo $instellingen; ?>">
            <span class="icon-menu-cogs"></span></i>Wachtwoord aanpassen
        </a>
        
        <div class="sidebar_element_last">
            <a href="<?php echo $uitloggen; ?>">Uitloggen</a> 
            &#8226; 
            <a href="<?php echo $profiel_deactiveren; ?>">Profiel Deactiveren</a>
        </div>
    </nav>
</sidebar>
