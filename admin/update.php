<?php 
    header("Location: index.php");
    
    if (isset($_GET["id"], $_GET["action"])) {
        include '../includes/connect.php';

        if ($_GET["action"]=="accept") {
                $verificatie = 1;
        } 
        if ($_GET["action"]=="decline") {
                $verificatie = 0;
        } 

        $stmt = $db->prepare("UPDATE werkgevers SET verificatie='".$verificatie."' WHERE id='".$_GET["id"]."'");
        $stmt->execute();
    }


?>