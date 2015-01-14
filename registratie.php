<?php

session_start();

// Server data
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "stagepeer";

// Verbinding met database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die ("Connection failed!" . $conn->connect_error);
} else {     
    $email = trim($_POST['gebruikersnaam']);
    $achternaam = trim($_POST['achternaam']);
    $naam = trim($_POST['voornaam']);
    $telefoonnummer = trim($_POST['telefoon']);
    $plaatsnaam= trim($_POST['plaatsnaam']);
    $wachtwoord = trim($_POST['wachtwoord']);
}

// Check om te kijken of variabelen goed zijn verwerkt
echo "Variables: " . "<br>" . $email . "<br>" . $achternaam . "<br>" . $naam . "<br>" . $telefoonnummer . "<br>" . $plaatsnaam . "<br>" . $wachtwoord;

// Checken of de variabelen niet leeg zijn en dan invoeren in de database
$sql =  "INSERT INTO werknemers" .
"(naam, achternaam, wachtwoord, telefoonnummer, plaatsnaam, email)" .
"VALUES ('$naam', '$achternaam', '$wachtwoord', '$telefoonnummer', '$plaatsnaam', '$email')";

foreach ("VALUES" as $var) {
    echo $var;
}
    
// Check om te kijken of het is ingevoerd
if ($conn->query($sql) === true) {
    echo "<br>" . "New record created succesfully!";
} else {
    echo "<br>" . "New record was not created.";
}

$conn->close();
?>
