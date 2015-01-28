<?php 

// Declaring global variables
$username = "";
$password = "";
    
// Requesting form input
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Password encryption
        $options = [
            'cost' => 12,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
                   ];
        
        $hash = password_hash($password, PASSWORD_BCRYPT, $options);
        
        // Parameters for registration
        $params = array(":username"=>$username,
                        ":password"=>$hash
        );
    }
}

try {
    $db = new PDO('mysql:host=localhost; dbname=test', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    $sql = $db->prepare("INSERT INTO gebruiker (username, password) VALUES(:username, :password)");
    $sql->execute($params);
} catch (PDOException $ex) {
    echo $ex . "Error";
}
?>

<html>
    <body>
       
       <!-- Normal input -->
        <fieldset> Normal Input
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
               <input type="text" placeholder="username" name="username" required>
               <input type="password" placeholder="password" name="password" required>
               <input type="submit" value="POST" name="submit">
            </form>
        </fieldset>
    </body>
</html>