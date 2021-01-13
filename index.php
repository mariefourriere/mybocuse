<?php
    session_start();

    if(!isset($_SESSION['logged'])){
        $_SESSION['logged'] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
</head>
<body>
   
    <main class="maincontainer">

    <?php
    if($_SESSION['logged'] == true){
        include("./include/dashboard.php"); // add path to profile
    }
    else if(isset($_POST['email']) AND ($_POST['password'])){ // add id input email and password
        $userEmail = 'email: ' . $_POST['email'] . " \n"; // add id input email
        $authenticationLog = [date("[d/m/y, H:i:s] - "),$userEmail];

        file_put_contents('log.txt', $authenticationLog, FILE_APPEND); // add path to log

        include("secret.php");
        $dbbocuse = new PDO('mysql:host=localhost; dbname=mybocuse', $phpmalog, $phpmapasswd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $validuser = $_POST['email']; // add id input email
        $validpasswd = $_POST['password']; // add id input password

        $request = $dbbocuse->prepare('SELECT email, passwd FROM users WHERE email=?');
        $request->execute(array($validuser));

        $datas = $request->fetch();
        if(!empty($datas)){
            // $hashpwd = $datas['passwd'];
            // $verifypwd = password_verify($validpasswd, $hashpwd);
            if($datas['email'] == $validuser AND $datas['passwd'] == $validpasswd){
                $_SESSION['logged'] = true;
            }
        }

        if($_SESSION['logged'] == true){
            include("./include/dashboard.php"); // add path to profile
        }
        else{
            include("./include/login.php"); // add path to form
        }
    }
    else{
        include("./include/login.php"); // add path to form
    }
?>

    </main>
    <footer class="footer">
    </footer>
    <script src="script.js"></script>
</body>
</html>

</body>
</html>
