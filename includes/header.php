<?php 

$inlognaam = 'Inloggen';
$reglog = 'Registreren';

$incl_connect = './includes/connect.php';

function getUrl() {
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
}

if (strpos(getUrl(), 'werknemers') || strpos(getUrl(), 'werkgevers')) { 
    // Als op pagina werkgever of werknemer
    if (isset($_SESSION['valid'])) { 
        // Check voor werknemer of werkgever en of deze bestaan met een waarde.
        include '.'.$incl_connect;
        if (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid'])) {
            $id = $_SESSION['werknemerid'];
            $sql_header = $db->prepare("SELECT naam, achternaam FROM werknemers WHERE ID =:id LIMIT 1");
            $sql_header ->execute(array(
                'id' => $id
            )); 
            $result =  $sql_header ->fetch();
            $inlognaam = $result['naam'].' '.$result['achternaam'];
        } elseif (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid'])) {
            $id = $_SESSION['werkgeverid'];
            $sql_header = $db->prepare("SELECT naam FROM werkgevers WHERE ID =:id LIMIT 1");
            $sql_header ->execute(array(
                'id' => $id
            )); 
            $result =  $sql_header ->fetch();
            $inlognaam = $result['naam']; 
        } 
        $loggin = './mijn_account.php';
        $reglog = 'Uitloggen';
        $reglink = '../logout.php';
    } else {
        $loggin = '../login_pagina.php';
        $reglink = '../registratie_pagina.php?link=1';
    }
    
} else {
    
    if (isset($_SESSION['valid'])) {
        // Check voor werknemer of werkgever en of deze bestaan met een waarde.
        include $incl_connect;
        if (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid'])) {
            $id = $_SESSION['werknemerid'];
            $sql_header = $db->prepare("SELECT naam, achternaam FROM werknemers WHERE ID =:id LIMIT 1");
            $sql_header ->execute(array(
                'id' => $id
            ));
            $result =  $sql_header ->fetch();
            $inlognaam = $result['naam'].' '.$result['achternaam'];
            $loggin = './werknemers/mijn_account.php';  
        } elseif (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid'])) {
            $id = $_SESSION['werkgeverid'];
            $sql_header = $db->prepare("SELECT naam FROM werkgevers WHERE ID =:id LIMIT 1");
            $sql_header ->execute(array(
                'id' => $id
            ));
            $result =  $sql_header ->fetch();
            $inlognaam = $result['naam'];
            $loggin = './werkgevers/mijn_account.php';
        }
        $reglog = 'Uitloggen';
        $reglink = './logout.php';
    } else {
        $loggin = './login_pagina.php';
        $reglink = './registratie_pagina.php?link=1';
    }
    
}
?>
<head>
    <link href="<?php echo $style; ?>" rel="stylesheet">
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
                <div class="left">
                    <a href="<?php echo $en; ?>"><div class="en">EN</div></a>
                    <a href="<?php echo $nl; ?>"><div class="nl">NL</div></a>
                </div>
                <div class="right">
                    <a href="<?php echo $reglink;?>"><div class="right_item"><?php echo $reglog; ?></div></a>              
                    <a href="<?php echo $loggin; ?>"><div class="right_item"><?php echo $inlognaam ?></div></a>
                </div>
            </div>
        </div>
            
        <div class="menu_main">
            <div class="wrapper">
                <a href="<?php echo $home; ?>"><img class="logo_stagepeer"  src="<?php echo $logo; ?>" alt="StagePeer" /></a>
                <nav>
                    <a href="<?php echo $hoe_werkt_het ; ?>"><div class="menu_item">Hoe werkt het?</div></a>
                    <a href="<?php echo $home ; ?>"><div class="menu_item">Zoek een vacature</div></a>
                    <a href="<?php echo $mijn_account ; ?>"><div class="menu_item">Mijn Account</div></a>
                </nav>
            </div>
        </div>