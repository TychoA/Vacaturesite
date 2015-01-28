<?php 
if (isset($_GET["id"])) {
    if ($_GET["kind"] == "werkgever") { 
        header("Location: admin_werkgevers.php");
        include '../includes/connect.php';

            if ($_GET["action"]=="accept") {
                    $stmt = $db->prepare("UPDATE werkgevers SET verificatie='1' WHERE id=:id");
                    $stmt->execute(array(':id' => $_GET["id"]));
            } 
            if ($_GET["action"]=="delete") {
                    $stmt = $db->prepare("DELETE FROM werkgevers WHERE id=:id");
                    $stmt->execute(array(':id' => $_GET["id"]));

                    $stmt = $db->prepare("DELETE FROM vacatures WHERE ID_werkgevers=:id");
                    $stmt->execute(array(':id' => $_GET["id"]));
            } 
    } 
    if ($_GET["kind"] == "werknemer") { 
        header("Location: admin_werknemers.php");
        include '../includes/connect.php';

            $stmt = $db->prepare("DELETE FROM werknemers WHERE id=:id");
            $stmt->execute(array(':id' => $_GET["id"]));

            $stmt = $db->prepare("DELETE FROM cv WHERE ID_werknemers=:id");
            $stmt->execute(array(':id' => $_GET["id"]));

            $stmt = $db->prepare("DELETE FROM favorieten WHERE ID_werknemers=:id");
            $stmt->execute(array(':id' => $_GET["id"]));

            $stmt = $db->prepare("DELETE FROM skills WHERE ID_werknemers=:id");
            $stmt->execute(array(':id' => $_GET["id"]));

            $stmt = $db->prepare("DELETE FROM taal WHERE ID_werknemers=:id");
            $stmt->execute(array(':id' => $_GET["id"]));
    }
    if ($_GET["kind"] == "vacature") { 
        header("Location: admin_vacatures.php");
        include '../includes/connect.php';

        $stmt = $db->prepare("DELETE FROM vacatures WHERE id=:id");
        $stmt->execute(array(':id' => $_GET["id"]));

    }
}
?>