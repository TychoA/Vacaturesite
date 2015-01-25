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
    
        <div class="menu_admin">
            
            <div class="wrapper">
                <a href="<?php echo $home; ?>" target="_blank"><p>Bekijk stagepeer.nl</p></a>
                <p class="admin_titel">Beheer</p>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper">  
            
        <main>
            <div class="full admin">
                <h1>Accounts om te verifi&#235;ren</h1>
                
                <?php 
            
                $stmt = $db->prepare("SELECT ID, naam, email, telefoonnummer, plaatsnaam, kvk, url_foto FROM werkgevers WHERE verificatie=0");
                $stmt->execute();
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="account">
                            <img src="<?php echo $row['url_foto']; ?>" alt="<?php echo $row['naam']; ?>"/>
                            <a href="update.php?id=<?php echo $row['ID']; ?>&action=accept"><div class="pending_yes"><i class="fa fa-check"></i></div></a>
                            
                            <h4><?php echo $row['naam']; ?> (<?php echo $row['email']; ?>)</h4>
                            <p class="account_info"><?php echo $row['telefoonnummer']; ?> | <?php echo $row['plaatsnaam']; ?> | <?php echo $row['kvk']; ?></p>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='info'>Er zijn momenteel geen accounts om te verifi&#235;ren!</p>";
                }?> 
                
            </div>
            
            <div class="full admin">
                <h1>Actieve accounts</h1>
                
                <?php 
            
                $stmt = $db->prepare("SELECT ID, naam, email, telefoonnummer, plaatsnaam, kvk, url_foto FROM werkgevers WHERE verificatie=1");
                $stmt->execute();
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="account">
                            <img src="<?php echo $row['url_foto']; ?>" alt="<?php echo $row['naam']; ?>"/>
                            
                            <a href="update.php?id=<?php echo $row['ID']; ?>&action=decline"><div class="decline"><i class="fa fa-check"></i></div></a>
                            
                            <h4><?php echo $row['naam']; ?> (<?php echo $row['email']; ?>)</h4>
                            <p class="account_info"><?php echo $row['telefoonnummer']; ?> | <?php echo $row['plaatsnaam']; ?> | <?php echo $row['kvk']; ?></p>
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
        <?php include '../includes/footer_admin.php';?>
    <!-- /FOOTER AREA -->
    
    
</body>
    
</html>