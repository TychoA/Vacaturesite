<?php 
    include '../includes/connect.php';
    if (!isset($_SESSION)) {
        session_start();  
    }

    $userID = $_SESSION['werknemerid'];
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

    $sql_2 = "SELECT naam, achternaam, url_foto FROM werknemers WHERE id=".$userID." LIMIT 1";
    $results_2 = $db->query($sql_2);
    foreach($results_2 as $row_2) 
    { 
        $sidebar_naam = $row_2['naam'];
        $sidebar_achternaam = $row_2['achternaam'];
        $url = $row_2['url_foto'];
    }

?>
   

<sidebar>
    <img class="face" src="<?php echo $url ?>" alt="Naam Voornaam" /> 
    
    <nav class="nav_sidebar">
        <div class="sidebar_element_fist"><?php echo $sidebar_naam.' '.$sidebar_achternaam; ?></div>
        
        <a class="sidebar_element" href="<?php echo $mijn_profiel; ?>">
            <span class="m-user"></span>Mijn Profiel
        </a>
            
        <a class="sidebar_element" href="<?php echo $favorieten; ?>">
            <span class="m-heart"></span>Favorieten
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
            <a href="<?php echo $profiel_deactiveren; ?>"  onclick="return confirm('Weet u ZEKER dat u uw gehele profiel wilt verwijderen?')">Profiel Deactiveren</a></div>
    </nav>
</sidebar>

