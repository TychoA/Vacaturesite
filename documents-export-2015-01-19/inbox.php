<?php  
    session_start();
    include '../connect.php';

    $userID = '1'; //UserID moet al bekend zijn.
    $array_ber = []; //alle bericht-gegevens + naam werkgever

    //SQL-query om alle berichten en werkgevers-naam op te vragen in phpmyadmin
    $sql = "SELECT verstuurd_werkgever.titel, verstuurd_werkgever.datum, verstuurd_werkgever.bericht, verstuurd_werkgever.gelezen, verstuurd_werkgever.ID, werkgevers.naam, werkgevers.id, ID_vacature
            FROM verstuurd_werkgever 
            INNER JOIN werkgevers
            ON werkgevers.ID = verstuurd_werkgever.ID_werkgever AND verstuurd_werkgever.ID_werknemer=".$userID."
            ORDER BY verstuurd_werkgever.datum DESC
            ";

    $results = $db->query($sql);

    foreach($results as $row) 
    { 
        $titel = $row['titel'];
        $werkgever = $row['naam'];
        $datum = $row['datum'];
        $bericht = $row['bericht'];
        $gelezen = $row['gelezen'];
        $berichtID = $row['ID'];
        $werkgever_ID = $row['id'];
        $vacature_ID = $row['ID_vacature'];
        $temp_array = [$titel, $werkgever, $datum, $bericht, $gelezen, $berichtID, $werkgever_ID, $vacature_ID];
        //Push alle gevonden berichtgegevens in de array
        array_push($array_ber, $temp_array);
    }
    // Sla berichten op in sessie, voor gebruik in huidig.php
    $_SESSION['array_ber'] = $array_ber;
    $_SESSION['userID'] = $userID;
    
    echo '<h2>Ontvangen</h2>';

    // Weergeven van alle berichten
    for ($i=0; $i < sizeof($array_ber); $i++) {
            $titel = $array_ber[$i][0];
            $werkgever = $array_ber[$i][1];
            $datum = $array_ber[$i][2];
            $bericht = $array_ber[$i][3];
            $gelezen = $array_ber[$i][4];
            $envelop = 'fa fa-envelope fa-fw unread';

            if ($gelezen) {
                $envelop = 'fa fa-envelope-o fa-fw read'; 
            }
            
            echo '<div class="ber_mini">
                    <h4 class="klikt"><i class="'.$envelop.'"></i> '.$titel.'</h4>
                    <p class="vac_mini_info">'.$werkgever.' | '.$datum.'</p>
                    <p class="ber_mini_beschr">'.substr($bericht, 0, 280).'...</p>
                  </div>'; // Je kunt alleen de eerste 280 tekens van het bericht zien
    }
?>