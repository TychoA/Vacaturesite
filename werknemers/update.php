<?php session_start(); 

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
} else {
    header ( 'Location:../login_pagina.php');
}

if (isset($_POST["skill"])) {
    header("Location: mijn_profiel.php#skills");
    include '../includes/connect.php';
    
    $stmt = $db->prepare("INSERT INTO skills (ID_werknemers, skill, vaardigheid) VALUES (:id, :naam, :vaardigheid)");
    $stmt->execute(array(':id' => $userID, ':naam' => $_POST["naam"], ':vaardigheid' => $_POST["vaardigheid"]));
            
}

if (isset($_POST["taal"])) {
    header("Location: mijn_profiel.php#talen");
    include '../includes/connect.php';
    
    $stmt = $db->prepare("INSERT INTO taal (ID_werknemers, taal, vaardigheid) VALUES (:id, :naam, :vaardigheid)");
    $stmt->execute(array(':id' => $userID, ':naam' => $_POST["naam"], ':vaardigheid' => $_POST["vaardigheid"]));
            
}

if (isset($_POST["diploma"])) {
    $type = "diploma";   
}
if (isset($_POST["werkervaring"])) {
    $type = "werkervaring";   
}
if (isset($_POST["opleiding"])) {
    $type = "opleiding";   
}

if (isset($_POST["diploma"]) OR isset($_POST["werkervaring"]) OR isset($_POST["opleiding"])) {
    header("Location: mijn_profiel.php#".$type);
    include '../includes/connect.php';
    
    $stmt = $db->prepare("INSERT INTO cv (ID_werknemers, type, naam, instituut, datum, locatie, beschrijving) 
    VALUES (:id, :type, :naam, :instituut, :datum, :locatie, :beschrijving)");
    $stmt->execute(array(':id' => $userID, ':type' => $type, ':naam' => $_POST["naam"], ':instituut' => $_POST["instituut"], ':datum' => $_POST["datum"], ':locatie' => $_POST["locatie"], ':beschrijving' => $_POST["beschrijving"]));
            
}

?>