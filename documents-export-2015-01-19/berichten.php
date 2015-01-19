<html>
    <?php include './linking.php'; ?>

    <!-- HEADER AREA -->
    <?php include '../includes/header.php';?>
    
        <div class="sub_menu">
            <div class="wrapper">
                <a href="<?php echo $home; ?>">Home</a>
                <span class="dash">/</span>
                <a href="<?php echo $mijn_account; ?>">Mijn Account</a>
                <span class="dash">/</span>
                <a href="<?php echo $berichten; ?>">Mijn Berichten</a>
            </div>
        </div>
            
    </header>
    <!-- /HEADER AREA -->
    
    <!-- MAIN AREA -->
    <div class="wrapper  beheer">  
        <?php include '../includes/sidebar_werknemers.php';?>
            
        <main>
            <h1>Mijn berichten</h1>
            <p class="back inbox">
                <a href="<?php echo $mijn_account; ?>">
                    <i class="fa fa-chevron-left"></i>Terug naar overzicht
                </a>
                <a class="toInbox">
                     <i class="fa fa-inbox fa-2x"></i>Ontvangen
                </a>
                <a class="toSend">
                     <i class="fa fa-send fa-2x"></i>Verstuurd
                </a>
            </p>
                
            <div class="full" id="divInbox">
                <?php 
                     include 'inbox.php';
                ?>
            </div>
        </main>
    </div>
    <!-- /MAIN AREA -->

    <!-- FOOTER AREA -->
        <?php include '../includes/footer.php';?>
    <!-- /FOOTER AREA -->
    
    <script>
    
    </script>
</body>
    
</html>