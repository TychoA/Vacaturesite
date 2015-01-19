<!-- DATA BASE CONNECTIE -->
    <?php      
        try {
            $db = new PDO('mysql:host=localhost;dbname=stagepeer;charset=utf8',
                'root', '');
        } catch(PDOException $ex) {
            die("Something went wrong while connecting to the database!");
        }
   ?>