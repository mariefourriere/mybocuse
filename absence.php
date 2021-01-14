<?php
try {
    $conn = new PDO('mysql:host=localhost; dbname=mybocuse', 'user', 'P@ssW0rd', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
             $maDate=   date("Y-m-d");
             $timestamp2 = strtotime($maDate);
             $monId = $_SESSION['userId'];
             $i=0;
            $getId = "SELECT * FROM departure WHERE  `user_id` = $monId and arrivals is null or departures is null";
            $result = $conn->query($getId);
            
            while($row = $result->fetch()) {
                $i++;
                if(!$row){  
                 echo null;
                }else{
                  echo $i;
                }
                
            }
            
    }

?>
