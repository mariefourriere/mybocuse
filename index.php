<?php
include("secret.php");

try
{
$dbbocuse = new PDO('mysql:host=localhost; dbname=Bocuze', $php_user, $php_passw, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>
<body>
<main class="maincontainer">
<?php

if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){

    $validuser = $_POST['email'];
    $password = $_POST['password'];
    $fk_userid = $_POST ['fk_userid'];
    $account_type = $_POST['account_type'];
    //verify here that the email is the right one
    $request = $dbbocuse->prepare('SELECT email, passwd, account_type FROM users WHERE email=?');
        $request->execute(array($validuser)); 

    {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['fk_userid'] = $_POST['fk_userid'];
        $_SESSION['account_type'] = $_POST['account_type'];

    }

    
;    
  
}

if($_SESSION){
    if($account_type === 'student'){
        include('include/studentdashboard.php');
    }else{
        include("include/chefdashboard.php");
    }
    
}else{
    include('include/login.php');
}
?>

</main>
    <footer>
    <div class="content has-text-centered">
      <p class="footertext">
        <strong>Fair use disclaimer</strong> this website is for educational purposes only.
      </p>
    </div>
  </footer>
    <script src="script.js"></script>

    

</body>
</html>