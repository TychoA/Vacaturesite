<?php session_start();

if (!isset($_SESSION['admin'])) {
     header ( 'Location: ./login_admin.php');
}

?>
   <!-- HEADER AREA -->
    <?php include '../includes/connect.php';?>
    <?php include './linking.php';?>
    <?php include '../includes/header_admin.php';?>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper">  
            
        <main>
            <div class="full admin">
                <h1>Werkgever accounts om te verifi&#235;ren</h1>
                
                <?php 
            
                $stmt = $db->prepare("SELECT ID, naam, email, telefoonnummer, locatie, kvk, url_foto FROM werkgevers WHERE verificatie=0");
                $stmt->execute();
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="account">
                            <img src="<?php echo $row['url_foto']; ?>" alt="<?php echo $row['naam']; ?>"/>
                            <a href="update.php?id=<?php echo $row['ID']; ?>&kind=werkgever&action=accept"><div class="pending_yes"><span class="accept"></span></div></a>
                            
                            <h4><?php echo $row['naam']; ?> (<?php echo $row['email']; ?>)</h4>
                            <p class="account_info"><?php echo $row['telefoonnummer']; ?> | <?php echo $row['locatie']; ?> | <?php echo $row['kvk']; ?></p>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='info'>Er zijn momenteel geen accounts om te verifi&#235;ren!</p>";
                }?> 
                
            </div>
            
            <div class="full admin">
                <h1>Actieve werkgever accounts</h1>
                
                <?php 
            
                $stmt = $db->prepare("SELECT ID, naam, email, telefoonnummer, locatie, kvk, url_foto FROM werkgevers WHERE verificatie=1");
                $stmt->execute();
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  
                        $id = $row['ID']; ?>
                        <div class="account">
                            <img src="<?php echo $row['url_foto']; ?>" alt="<?php echo $row['naam']; ?>"/>
                            
                            <a href="" onclick="deleteWerkgever(<?php echo $id; ?>)"><div class="decline"><span class="close-big"></span></div></a>
                            
                            <h4><?php echo $row['naam']; ?> (<?php echo $row['email']; ?>)</h4>
                            <p class="account_info"><?php echo $row['telefoonnummer']; ?> | <?php echo $row['locatie']; ?> | <?php echo $row['kvk']; ?></p>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='info'>Er zijn momenteel geen actieve werkgever accounts!</p>";
                }?> 
                
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->