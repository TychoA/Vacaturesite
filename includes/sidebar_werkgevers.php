<?php 
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
                <i class="fa fa-group fa-fw fa-lg"></i> Profiel
        </a>
        <a class="sidebar_element" href="<?php echo $vacature_toevoegen; ?>">
            <i class="fa fa-plus fa-fw fa-lg"></i>Nieuwe vacature
        </a>
        <a class="sidebar_element" href="<?php echo $openstaande_vacatures; ?>">
            <i class="fa fa-bullhorn fa-fw fa-lg"></i>Openstaande vacatures
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
            <a href="<?php echo $profiel_deactiveren; ?>">Profiel Deactiveren</a>
            <?php ?>            
        </div>
    </nav>
</sidebar>
