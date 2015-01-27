<?php  
   if (!isset($_SESSION)) {
        session_start();  
    }
    $bedrijfID = $_SESSION['werkgeverid'];
    include '../includes/connect.php';
    //UserID moet al bekend zijn.
    $array_ber = []; //alle bericht-gegevens + naam werkgever

    //SQL-query om alle berichten en werkgevers-naam op te vragen in phpmyadmin
    $sql = "SELECT verstuurd_werknemer.titel, verstuurd_werknemer.datum, verstuurd_werknemer.bericht, verstuurd_werknemer.gelezen, verstuurd_werknemer.ID, werknemers.naam, werknemers.id, ID_vacature
            FROM verstuurd_werknemer
            INNER JOIN werknemers
            ON werknemers.ID = verstuurd_werknemer.ID_werknemer AND verstuurd_werknemer.ID_werkgever=".$bedrijfID."
            ORDER BY verstuurd_werknemer.datum DESC
            ";

    $results = $db->query($sql);

    foreach($results as $row) 
    { 
        $titel = $row['titel'];
        $werknemer = $row['naam'];
        $datum = $row['datum'];
        $bericht = $row['bericht'];
        $gelezen = $row['gelezen'];
        $berichtID = $row['ID'];
        $werknemers_ID = $row['id'];
        $vacature_ID = $row['ID_vacature'];
        $temp_array = [$titel, $werknemer, $datum, $bericht, $gelezen, $berichtID, $werknemers_ID, $vacature_ID];
        //Push alle gevonden berichtgegevens in de array
        array_push($array_ber, $temp_array);
    }
    // Sla berichten op in sessie, voor gebruik in huidig.php
    $_SESSION['array_ber'] = $array_ber;
    $_SESSION['bedrijfID'] = $bedrijfID;
    
    echo '<h2>Ontvangen</h2>';

    // Weergeven van alle berichten
    for ($i=0; $i < sizeof($array_ber); $i++) {
            $titel = $array_ber[$i][0];
            $werknemer = $array_ber[$i][1];
            $datum = $array_ber[$i][2];
            $bericht = $array_ber[$i][3];
            $gelezen = $array_ber[$i][4];
            $berichtID = $array_ber[$i][5];
        
            $ID_vac = $array_ber[$i][7];
        
            $sql_vacature = "SELECT id FROM vacatures";
            $results_vac = $db->query($sql_vacature);
            foreach($results_vac as $row_vac) 
            {
                if ($row_vac['id'] == $ID_vac) {
                    $titel = $array_ber[$i][0];
                } else {
                    $titel = 'Deze vacature bestaat niet meer';    
                }
            }
            
            $envelop = 'fa fa-envelope fa-fw unread';

            if ($gelezen) {
                $envelop = 'fa fa-envelope-o fa-fw read'; 
            }
            
            echo '<div class="ber_mini">
                    <a href="./remove_ber_wg.php?id='.$berichtID.'" target="_self"><i class="fa fa-close fa-lg delete"></i></a>
                    <h4 class="klikt"><i class="'.$envelop.'"></i> '.$titel.'</h4>
                    <p class="vac_mini_info">'.$werknemer.' | '.$datum.'</p>
                    <p class="ber_mini_beschr">'.substr($bericht, 0, 280).'...</p>
                  </div>'; // Je kunt alleen de eerste 280 tekens van het bericht zien
    }
?>