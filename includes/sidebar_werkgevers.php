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


    $sql_2 = "SELECT naam, url_foto FROM werkgevers WHERE id=".$bedrijfID." LIMIT 1";
    $results_2 = $db->query($sql_2);
    foreach($results_2 as $row_2) 
    { 
        $sidebar_naam = $row_2['naam'];
         $url = $row_2['url_foto'];
    }
?>
   

   
<sidebar>
    <img class="face" src="<?php echo $url ?>" alt="Naam Voornaam" /> 
    <nav class="nav_sidebar">
        <div class="sidebar_element_fist"><?php echo $sidebar_naam ?></div>
        
        <a class="sidebar_element" href="<?php echo $mijn_profiel; ?>">
            <span class="m-group"></span> Profiel
        </a>
        <a class="sidebar_element" href="<?php echo $vacature_toevoegen; ?>">
            <span class="m-plus"></span>Nieuwe vacature
        </a>
        <a class="sidebar_element" href="<?php echo $openstaande_vacatures; ?>">
            <span class="m-bullhorn"></span>Openstaande vacatures
        </a>
        <a class="sidebar_element" href="<?php echo $berichten; ?>">
            <span class="m-envelope"></span><span id="unread"><?php echo $aantalNieuweBerichten ?> ongelezen bericht(en)</span>
        </a>
        <a class="sidebar_element" href="<?php echo $instellingen; ?>">
            <span class="m-cogs"></span>Wachtwoord aanpassen
        </a>
        
        <div class="sidebar_element_last">
            <a href="<?php echo $uitloggen; ?>">Uitloggen</a> 
            &#8226; 
            <a href="<?php echo $profiel_deactiveren; ?>" onclick="confirm('Weet u zeker dat u uw profiel wilt verwijderen?');">Profiel Deactiveren</a>
            <?php ?>            
        </div>
    </nav>
</sidebar>
