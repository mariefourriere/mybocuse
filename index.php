<?php
session_start();
include("secret.php");

try
{
	$dbbocuse = new PDO('mysql:host=localhost;dbname=xnnujqmj_mybocuse;charset=utf8', $phpmalog, $phpmapasswd);
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
    $request = $dbbocuse->query('SELECT email, password, account_type, userid FROM users');
       while($donnees = $request->fetch()){
           
        if($donnees['email'] === $validuser && $donnees['password'] == $password){
            $_SESSION['email'] = $donnees['email'];
            $_SESSION['password'] = $donnees['password'];
            $_SESSION['userid'] = $donnees['userid'];
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
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="./asset/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

</head>
<body>
<main class="main--container">
<?php

if($_SESSION){
  
    if($_SESSION['account_type'] === "student"){
        include('studentdashboard.php');
    }else{
        include('chefdashboard.php');
    }
   

    
}else{
    include('login.php');
}

?>

</main>

<?php 
    include("footer.php");
    ?>
    
    <script src="script.js"></script>

    

</body>
</html>
