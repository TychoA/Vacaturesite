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
            
        $stmt = $db->prepare("SELECT naam, email FROM werknemers WHERE id=:id");
        $stmt->execute(array(':id' => $_GET["id"]));

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
            $naam = $row['naam'];
            $email = $row['email'];
        }
        
        $subject = "Deactivering account StagePeer.nl";
        $header = 'From: StagePeer noreply@stagepeer.nl';
        
        $message  = "Beste ".$naam.",\n\n";
        $message .= "Bij deze moeten wij u helaas mededelen dat uw account bij StagePeer.nl is gedeactiveerd.\n";
        $message .= "Mocht u vragen hebben wat betreft het deactiveren van uw account, dan kunt u ten alle tijden contact opnemen met StagePeer. Zie onze contactgegevens op de website (www.stagepeer.nl).\n\n";
        $message .= "Met vriendelijke groet,\n\n";
        $message .= "StagePeer.nl";
        
        mail($email, $subject, $message, $header));
        

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