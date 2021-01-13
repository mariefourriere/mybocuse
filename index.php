<?php
session_start();
include("secret.php");

try
{
$dbbocuse = new PDO('mysql:host=localhost; dbname=Bocuze', $php_user, $php_passw, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){

    $validuser = $_POST['email'];
    $password = $_POST['password'];
    
    
    $bool = true;
    //verify here that the email is the right one
    $request = $dbbocuse->query('SELECT email, password, account_type FROM users');
       while($donnees = $request->fetch()){
           
        if($donnees['email'] === $validuser && $donnees['password'] == $password){
            $_SESSION['email'] = $donnees['email'];
            $_SESSION['password'] = $donnees['password'];
            // $_SESSION['fk_userid'] = $_POST['fk_userid'];
            $_SESSION['account_type'] = $donnees['account_type'];
           }
       }
}else{
    $bool = false;
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>
<body>
<main class="maincontainer">
<?php

if($_SESSION){
  
if($_SESSION['account_type'] === "student"){
    include('./include/studentdashboard.php');
}else{
    include('./include/chefdashboard.php');
}
   

    
}else{
    include('./include/login.php');
}

?>

</main>
    
    <script src="script.js"></script>

    

</body>
</html>