<?php 
if (!isset($_SESSION)) {
        session_start();                
}
include '../includes/connect.php';

$array_berichten = $_SESSION['array_ber'];
$bericht_klikt = $_GET["id"]; // Nummer van aangeklikte bericht wordt uit de URL gehaald

$titel = $array_berichten[$bericht_klikt][0];
$werkgever = $array_berichten[$bericht_klikt][1];
$datum = $array_berichten[$bericht_klikt][2];
$bericht = $array_berichten[$bericht_klikt][3];
$bericht_ID = $array_berichten[$bericht_klikt][5];
$werknemer_ID = $array_berichten[$bericht_klikt][6];
$vacature_ID = $array_berichten[$bericht_klikt][7];

$_SESSION['array_beantwoorden'] = [$titel, $werkgever, $datum, $bericht, $bericht_ID, $werknemer_ID, $vacature_ID];

// Update of het bericht gelezen is of niet
$update_gelezen = "UPDATE verstuurd_werknemer SET gelezen='1' WHERE ID=".$bericht_ID;
$db->query($update_gelezen);

// Weergeven van aangeklikte bericht
echo '<div class="ber_mini">
        <h4>'.$titel.'</h4> 
        <p class="vac_mini_info">'.$werkgever.' | '.$datum.'</p>
        <p class="ber_mini_beschr">'.$bericht.'</p>
      </div>';

?>

<div class="ber_beant">
    <form method="post" action="antwoord_email.php">
    <textarea rows="5" cols="60" class="textarea_beant" name="update_text">Typ hier uw antwoord</textarea>
    <input type="submit" value="Beantwoorden" class="button_beant" />
    </form>
</div>


