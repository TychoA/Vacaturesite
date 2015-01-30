<?php
if (!isset($_SESSION[""])) {
    session_start();
    ob_start();
}
include('./includes/connect.php');

$userID = "";
$succes = false;
$mail = "";

// Account deactivatie mail
$bericht = "Uw account is succesvol verwijderd.";
$bericht = wordwrap($bericht, 70, "\r\n");

// ID gelijkgestellen aan het userid wat ingelogd is
if (isset($_SESSION['werknemerid'])) {
    $soort = "werknemers";
    $userID = $_SESSION['werknemerid'];
    
    // Selecteer email voor deactivatie mail
    $sql = $db->prepare("SELECT email FROM ".$soort." WHERE id=".$userID);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) {
        $mail = $row['email'];
    }
    
    //$confirm = "<script>confirm('Weet U zeker dat je het account wilt verwijderen?')</script>";
    
    // Voer query uit na verstuurde email
    if (mail($mail, "Account Deactivatie", $bericht)) {
        
        $sqln = $db->prepare("DELETE FROM ".$soort." WHERE id=".$userID);
        $sqln->execute();

        $sql1 = $db->prepare("DELETE FROM cv WHERE ID_werknemers=".$userID);
        $sql1->execute();

        $sql2 = $db->prepare("DELETE FROM favorieten WHERE id=".$userID);
        $sql2->execute();

        $sql3 = $db->prepare("DELETE FROM skills WHERE id=".$userID);
        $sql3->execute();

        $sql4 = $db->prepare("DELETE FROM taal WHERE id=".$userID);
        $sql4->execute();

        $succes = true;  
    }
}   
else if(isset($_SESSION['werkgeverid'])) {
    $soort = "werkgevers";
    $userID = $_SESSION['werkgeverid'];
    
    $sql = $db->prepare("SELECT email FROM ".$soort." WHERE id=".$userID);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) {
        $mail = $row['email'];
    }
    
    //$confirm = "<script>confirm('Weet U zeker dat je het account wilt verwijderen?')</script>";
    
    // Voer query uit na verstuurde email 
    if (mail($mail, "Account Deactivatie", $bericht)) {
        
        $sqlg = $db->prepare("DELETE FROM ".$soort." WHERE id=".$userID);
        $sqlg->execute();

        $sql5 = $db->prepare("DELETE FROM vacatures WHERE ID_werkgevers=".$userID);
        $sql5->execute();

        $succes = true;    
    }
}

// Verwijzen naar de hoofdpagina bij een succesvolle deactivatie
if ($succes === true) {
    echo "<script>window.location='./index.php'</script>";
    session_destroy();
} 
// Error message bij een onsuccesvolle deactivatie
else {
    echo "<script>alert('Er is iets niet goed gegaan. Probeer het opnieuw of neem contact op met de beheerder.');</script>";
    echo "<script>history.go(-1);</script>";
}
?>
