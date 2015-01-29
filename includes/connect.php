<!-- DATA BASE CONNECTIE -->
    <?php    
        try {
            $db = new PDO('mysql:host=localhost;dbname=stagepeer;charset=utf8',
                'luca', 'fez7cJpE');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $ex) {
            die("Something went wrong while connecting to the database!");
        } 
   ?>