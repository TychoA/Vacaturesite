<?php


// Server data
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "stagepeer";

// Connection with database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die ("Connection failed!" . $conn->connect_error);
}

// Select columns from table werknemers
$sql =  "SELECT * FROM werknemers";
$result = $conn->query($sql);

// Echo the selected rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $gebruikerscontrole = $row["email"];
        $wachtwoordcontrole = $row["wachtwoord"];
    } 
}
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['gebruikersnaam'], $_POST['wachtwoord'])) {
        
        $gebruiker = trim($_POST['gebruikersnaam']);
        $wachtwoord = trim($_POST['wachtwoord']);
        
        if($gebruiker == $gebruikerscontrole && $wachtwoord == $wachtwoordcontrole) {
        
        header( 'Location: /Vacaturesite/index.php');    
        } else {
            echo '<script type="text/javascript"> alert("Ongeldige inloggegevens!");
            window.location.href = "login_pagina.php";
            </script>';
        }
    } else {
        echo 'Een vereisd veld bestaat niet!';
    }
}

$conn->close();
?>
