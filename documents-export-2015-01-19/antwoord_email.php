<?php
session_start();
include '../connect.php';

$User_ID = $_SESSION['userID'];
$antwoord = strip_tags($_POST['update_text']);
$array_beantwoorden = $_SESSION['array_beantwoorden'];

$titel = $array_beantwoorden[0];
//$werkgever = $array_beantwoorden[1];
//$datum = $array_beantwoorden[2];
$bericht = $array_beantwoorden[3];
$bericht_ID = $array_beantwoorden[4];
$werkgever_ID = $array_beantwoorden[5];
$vacature_ID = $array_beantwoorden[6];

$new_titel = 'RE: '.$titel;

trim($antwoord);
$new_text = $antwoord.'<br>-------------------------<br>'.$bericht.$werkgever_ID;

$update_bericht = "UPDATE verstuurd_werkgever
                   SET bericht = :new_text
                   WHERE ID = :berichtID";

$update_verzend = "INSERT INTO `stagepeer`.`verstuurd_werknemer` (`ID`, `ID_werknemer`, `ID_werkgever`, `ID_vacature`, `datum`, `titel`, `bericht`, `gelezen`) VALUES (NULL, :werknemerid, :werkgeverid, :vacatureid, CURRENT_TIMESTAMP, :new_title, :new_text, '0')";

$sth = $db->prepare($update_bericht);
$sth2 = $db->prepare($update_verzend);

$sth->execute(array( 
   ':new_text' => $new_text,
   ':berichtID' => $bericht_ID
 ));

$sth2->execute(array( 
    ':new_text' => $new_text,
    ':new_title' => $new_titel,
    ':werknemerid' => $User_ID,
    ':werkgeverid' => $werkgever_ID,
    'vacatureid' => $vacature_ID
 ));

header('Location: berichten.php');
?>