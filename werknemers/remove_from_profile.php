<?php 
if (isset($_GET["id"])) {
    if ($_GET["kind"] == "skill") { 
        header("Location: mijn_profiel.php#skills");
        include '../includes/connect.php';

        $stmt = $db->prepare("DELETE FROM skills WHERE id=:id");
        $stmt->execute(array(':id' => $_GET["id"])); 
    } 
    if ($_GET["kind"] == "diploma") { 
        header("Location: mijn_profiel.php#diploma");
        include '../includes/connect.php';

        $stmt = $db->prepare("DELETE FROM cv WHERE id=:id");
        $stmt->execute(array(':id' => $_GET["id"])); 
    } 
    if ($_GET["kind"] == "werkervaring") { 
        header("Location: mijn_profiel.php#werkervaring");
        include '../includes/connect.php';

        $stmt = $db->prepare("DELETE FROM cv WHERE id=:id");
        $stmt->execute(array(':id' => $_GET["id"])); 
    } 
    if ($_GET["kind"] == "opleiding") { 
        header("Location: mijn_profiel.php#opleiding");
        include '../includes/connect.php';

        $stmt = $db->prepare("DELETE FROM cv WHERE id=:id");
        $stmt->execute(array(':id' => $_GET["id"])); 
    } 
    if ($_GET["kind"] == "taal") { 
        header("Location: mijn_profiel.php#talen");
        include '../includes/connect.php';

        $stmt = $db->prepare("DELETE FROM taal WHERE id=:id");
        $stmt->execute(array(':id' => $_GET["id"])); 
    } 
}
?>