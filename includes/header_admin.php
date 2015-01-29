<?php 
    if (isset($_SESSION['admin'])) {
        $inlognaam = 'Uitloggen admin';
        $link = './logout_admin.php';
    } else {
        $inlognaam = 'Inloggen admin'; 
        $link = './login_admin.php';
    }
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>StagePeer | Jouw stage in de ICT vind je hier.</title>
        <!-- gemaakt door Webperen in opdracht voor WebDB (UvA - Informatiekunde) -->

        <meta name="description" lang="nl" content="StagePeer is d&#233; plek om op zoek te gaan naar jouw afstudeerstage in de ICT-sector. StagePeer is speciaal gericht op studenten van de Universiteit van Amsterdam en de Vrije Universiteit.>">
        <meta name="keywords" content="afstudeerstage, stage, ict, master, amsterdam, universiteit">

        <meta name="author" content="WebPeren">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta http-equiv="Content-Script-Type" content="text/javascript" />

        <link href="<?php echo $style; ?>" rel="stylesheet">
        <link href="<?php echo $icons; ?>" rel="stylesheet" >
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,300,400' rel='stylesheet' type='text/css'>
        <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>" />

        <script src="<?php echo $script; ?>"></script>
        <!--[if !IE 7]>
            <style type="text/css">
                #wrap {display:table;height:100%}
            </style>
        <![endif]-->
    </head>

    <body>

        <!-- WRAP FOR FOOTER --> 
        <div class="wrap">

        <!-- HEADER AREA --> 
        <header>
            <div class="menu_login">
                <div class="wrapper">
                    <div class="right">             
                        <a href="<?php echo $link ?>"><div class="right_item"><?php echo $inlognaam ?></div></a>
                    </div>
                </div>
            </div>

            <div class="menu_admin">

                <div class="wrapper">
                    <a href="index.php"><p class="admin_titel">Beheer</p></a>

                    <a href="admin_werkgevers.php"><p>Werkgevers</p></a>
                    <a href="admin_werknemers.php"><p>Werknemers</p></a>
                    <a href="admin_vacatures.php"><p>Vacatures</p></a>

                </div>
            </div>

        </header>
        <!-- /HEADER AREA --> 