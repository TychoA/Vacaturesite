<?php session_start();
    header ( 'Location: ./detail_vacature.php?id='.$_GET["id"]);

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
} else {
    header ( 'Location:../login_pagina.php');
}

if (isset($_GET["id"])) {
    
    include './includes/connect.php';
    $id_vac = $_GET["id"];
    
    $stmt = $db->prepare("INSERT INTO favorieten(ID_werknemers, ID_vacatures) VALUES (:id_wn, :id_vac)");
    $stmt->execute(array(':id_wn' => $userID, ':id_vac' => $id_vac));
    
    echo "something";
}
echo "something elkse";
?>