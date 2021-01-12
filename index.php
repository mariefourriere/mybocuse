<!-------------- START AUDREY -------------->

<?php
    session_start();

    if(!isset($_SESSION['logged'])){
        $_SESSION['logged'] = false;
    }
?>

<?php
    if($_SESSION['logged'] == true){
        include("..."); // add path to profile
    }
    else if(isset($_POST['*input id email']) AND ($_POST['*input id passwd'])){ // add id input email and password
        $userEmail = 'email: ' . $_POST['*input id email'] . " \n"; // add id input email
        $authenticationLog = [date("[d/m/y, H:i:s] - "),$userEmail];

        file_put_contents('...', $authenticationLog, FILE_APPEND); // add path to log

        include("secret.php");
        $dbbocuse = new PDO('mysql:host=localhost; dbname=mybocuse', $phpmalog, $phpmapasswd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $validuser = $_POST['*input id email']; // add id input emai
        $validpasswd = $_POST['*input id passwd']; // add id input password

        $request = $dbbocuse->prepare('SELECT email, passwd FROM users WHERE email=?');
        $request->execute(array($validuser));

        $datas = $request->fetch();
        if(!empty($datas)){
            if($datas['email'] == $validuser AND $datas['passwd'] == $validpasswd){
                $_SESSION['logged'] = true;
            }
        }

        if($_SESSION['logged'] == true){
            include("..."); // add path to profile
        }
        else{
            include("..."); // add path to form
        }
    }
    else{
        include("..."); // add path to form
    }
?>
<!-------------- END AUDREY -------------->