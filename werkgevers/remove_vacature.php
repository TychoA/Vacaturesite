<?php session_start(); 

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werkgeverid']) && !empty($_SESSION['werkgeverid']))) {
    $current_id = $_GET['id'];

    include '../includes/connect.php';
    $sql_remove = "DELETE FROM vacatures WHERE id = :id";
    $sql = $db->prepare($sql_remove);
    $sql ->execute(array(
        'id' => $current_id
    ));

    header ( 'Location:./openstaande_vacatures.php');
} else {
    session_destroy();
    header ( 'Location:../login_pagina.php');
}
?>