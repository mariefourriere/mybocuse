


<?php
include('secret.php');


   try {
      $conn = new PDO('mysql:host=localhost; dbname=xnnujqmj_mybocuse', $phpmalog, $phpmapasswd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   
      }
   catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }
    
      if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
        }else {
           session_start();
            $date = new DateTime("now", new DateTimeZone('Europe/Brussels') );
            $monHeure = $date->format('H:i:s');
            $maDate=   date("Y-m-d");
            $timestamp2 = strtotime($maDate);
            $monId = $_SESSION['userId'];
            $getId = "SELECT * FROM departure WHERE  `user_id` = $monId";
           $result = $conn->query($getId);
           $datas = $result->fetch();
           if(!empty($datas)){
            while($donnees = $datas){
               if($donnees['arrivals'] !== null and $donnees['departures'] !== null){
                  $deja = "Tu es deja venu à l'ecole ajrd";
                  //echo "<script type='text/javascript'>alert('$deja');</script>";
               }elseif($donnees['date_arrival'] == $timestamp2){
                  // ca veut dire qu'il a deja pointé une fois
                   
                  $sqlUpdate = "UPDATE departure SET departures = '$monHeure' WHERE `user_id` = $monId and date_arrival = $timestamp2 ";
                  $q = $conn->prepare($sqlUpdate);
                  $q->execute();
               }else{
                  
               };
            }
         }else{
            $sqlInsert = "INSERT INTO departure (arrivals, departures,date_arrival, `user_id`) VALUES ('$monHeure',null,$timestamp2,$monId)";
            $q = $conn->prepare($sqlInsert);
            $q->execute();
           }
         }   
    
   ?>
   