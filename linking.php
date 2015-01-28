<?php

//links voor werknemer of werkgever
if (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid'])) {
    $mijn_account           =   './werknemers/mijn_account.php';
    $mijn_profiel           =   './werknemers/mijn_profiel.php';
    $favorieten             =   './werknemers/favorieten.php';
    $berichten              =   './werknemers/berichten.php';
    $instellingen           =   './werknemers/instellingen.php';
} elseif (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid'])) {
    $mijn_account           =   './werkgevers/mijn_account.php';
    $mijn_profiel           =   './werkgevers/mijn_profiel.php';
    $favorieten             =   './werkgevers/favorieten.php';
    $berichten              =   './werkgevers/berichten.php';
    $instellingen           =   './werkgevers/instellingen.php';
} else {
    $mijn_account           =   './login_pagina.php';
    $mijn_profiel           =   './login_pagina.php';
    $favorieten             =   './login_pagina.php';
    $berichten              =   './login_pagina.php';
    $instellingen           =   './login_pagina.php';    
}

$style                  =   './css/style.css';
$font_awesome           =   './includes/font_awesome/css/font-awesome.min.css';
$icons                  =   './css/sprites.css';
$script                 =   './js/script.js';


$home                   =   './index.php';
$inloggen               =   './login_pagina.php';
$uitloggen              =   './index.php';
$registreren            =   './registratie_pagina.php?link=1';
$profiel_deactiveren    =   './deactivatie.php';
$ww_vergeten            =   './wachtwoord_vergeten.php';

$zoekresultaten         =   './zoekresultaten.php';
$detail_vacature        =   './detail_vacature.php';
$hoe_werkt_het          =   './hoe_werkt_het.php';
$contact                =   './contact.php';

$alg_voorwaarden        =   './alg_voorwaarden.php';
$privacy_beleid         =   './privacy_beleid.php';
$sitemap                =   './sitemap.php';

$logo                   =   './img/stagepeer.png';
$logo_wit               =   './img/stagepeer_wit.png';
$webperen               =   './img/De_WebPeren.jpg';

?>