<?php
        try {
            $db = new PDO('mysql:host=localhost;dbname=stagepeer;charset=utf8',
                'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $ex) {
            die("Something went wrong while connecting to the database!");
        }
?>

<div id="div" style="width:100; height:100px; background-color:tomato; padding: 20px; color:#FFF;">
    
    <?php
    
    $stmt = $db->prepare("SELECT verificatie FROM werkgevers");
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row["verificatie"];
    }?> 
</div>

<?php $id = 1; ?>

<a href="update.php?id=1&action=accept">Accept</a>
<a href="update.php?id=1&action=decline">Decline</a>