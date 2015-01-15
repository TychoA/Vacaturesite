<?php
session_start();

try {
$db = new PDO('mysql:host=localhost; dbname=stagepeer', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} 
catch(PDOException $ex) {
    echo $ex . "error";
}
$sql =  "SELECT * FROM werknemers";
$result = $db->prepare($sql);

foreach($db->query("SELECT ID, email, wachtwoord, naam FROM werknemers") as $row) {
    if ($_POST['gebruikersnaam'] === $row['email'] && $_POST['wachtwoord'] === $row['wachtwoord'])  {
    $_SESSION['userid'] = $userid;
    echo "<script>window.location= 'index.php' </script>";
} else {
    echo "<script>alert('Inloggegevens zijn incorrect!')</script>";
    echo "<script>window.location= 'login_pagina.php' </script>";
    }
}
session_destroy(); 
?>