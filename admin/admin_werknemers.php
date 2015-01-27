<?php session_start();

// Check of je ingelogd bent EN een werknemer bent, anders ga je naar de login_pagina.php
if (isset($_SESSION['valid']) && (isset($_SESSION['werknemerid']) && !empty($_SESSION['werknemerid']))) {
    $userID = $_SESSION['werknemerid'];
} else {
    header ( 'Location:../login_pagina.php');
}

?>
   <html>
    <?php include '../includes/connect.php';?>
    
    <?php include './linking.php';?>

    <!-- HEADER AREA -->
    <?php include '../includes/header_admin.php';?>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper">  
            
        <main>
            <div class="full admin">
                <h1>Actieve werknemer accounts</h1>
                
                <?php 
            
                $stmt = $db->prepare("SELECT ID, naam, achternaam, email, telefoonnummer, plaatsnaam, url_foto FROM werknemers");
                $stmt->execute();
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  
                        $id = $row['ID']; ?>
                        <div class="account">
                            <img src="<?php echo $row['url_foto']; ?>" alt="<?php echo $row['naam']; ?>"/>
                            
                            <a onclick="deleteWerknemer(<?php echo $id; ?>)"><div class="decline"><i class="fa fa-close"></i></div></a>
                            
                            <h4><?php echo $row['naam']." ".$row['achternaam']; ?> (<?php echo $row['email']; ?>)</h4>
                            <p class="account_info"><?php echo $row['telefoonnummer']; ?> | <?php echo $row['plaatsnaam']; ?></p>
                            <a href="#"><div class="bekijk_profiel">Bekijk gehele profiel</div></a>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='info'>Er zijn momenteel geen actieve werknemer accounts!</p>";
                }?> 
                
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>