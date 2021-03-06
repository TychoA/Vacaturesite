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
                <h1>Actieve vacatures</h1>
                
                <?php 
            
                $stmt = $db->prepare("SELECT vacatures.ID AS ID_vac, ID_werkgevers, werkgevers.ID, werkgevers.naam, datum, duur, vacatures.locatie, foto, titel, beschrijving_aanbod FROM vacatures INNER JOIN werkgevers ON werkgevers.ID = ID_werkgevers");
                $stmt->execute();
                $row_count = $stmt->rowCount();

                if ($row_count > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  
                        $id = $row["ID_vac"];
                        $res_timestamp = strtotime($row['datum']);
                        $datum = date("d/m/y",$res_timestamp);
                        $tijd = date("H:i",$res_timestamp);
                        $res_beschr = mb_substr($row["beschrijving_aanbod"], 0, 300);?>
                
                        <div class='account vac_mini'>
                            <a href="" onclick="deleteVacature(<?php echo $id; ?>)"><div class="decline"><span class="close-big"></span></div></a>
                            
                            <a href="<?php echo $detail_vacature; ?>?id=<?php echo $row["ID_vac"]; ?>" target="_blank">
                                <h4><?php echo $row["titel"]; ?></h4><div class="bekijk_vacature">bekijk gehele vacature</div>
                                <p class='vac_mini_info'><?php echo $row["naam"]; ?> | <?php echo $row["locatie"]; ?> | Geplaatst op <?php echo $datum; ?> om <?php echo $tijd; ?></p>
                                <p class='vac_mini_beschr'><?php echo $res_beschr; ?>...</p>
                            </a>
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