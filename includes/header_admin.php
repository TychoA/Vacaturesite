<?php 
    if (isset($_SESSION['admin'])) {
        $inlognaam = 'Uitloggen admin';
        $link = './logout_admin.php';
    } else {
        $inlognaam = 'Inloggen admin'; 
        $link = './login_admin.php';
    }
?>
<head>
    <link href="<?php echo $style; ?>" rel="stylesheet">
    <link href="<?php echo $icons; ?>" rel="stylesheet" >
    <link rel="stylesheet" href="<?php echo $font_awesome; ?>">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,300,400' rel='stylesheet' type='text/css'>
    <script src="<?php echo $script; ?>"></script>

    <!--[if !IE 7]>
		<style type="text/css">
			#wrap {display:table;height:100%}
		</style>
    <![endif]-->
</head>

<body>
    
    <!-- WRAP --> 
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