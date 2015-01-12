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
        <a class="sidebar_element" href="<?php echo $archief_vacatures; ?>">
            <i class="fa fa-archive fa-fw fa-lg"></i>Gesloten vacatures
        </a>
        <a class="sidebar_element" href="<?php echo $berichten; ?>">
            <i class="fa fa-envelope fa-fw fa-lg"></i>5 ongelezen berichten
        </a>
        <a class="sidebar_element" href="<?php echo $instellingen; ?>">
            <i class="fa fa-cogs fa-fw fa-lg"></i>Wachtwoord aanpassen
        </a>
        
        <div class="sidebar_element_last">
            <a href="<?php echo $uitloggen; ?>">Uitloggen</a> 
            &#8226; 
            <a href="<?php echo $profiel_deactiveren; ?>">Profiel Deactiveren</a>
        </div>
    </nav>
</sidebar>
