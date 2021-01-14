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
            $getId = "SELECT * FROM departure WHERE  `user_id` = $monId";
            $result = $conn->query($getId);
            $datas = $result->fetch();
            if(!empty($datas)){
                echo " <div >";
               while($donnees = $datas){
                $data = 'deja inscris';
                echo json_encode($data); 
            }

            echo "</div>
          </div>";
                

        }else{
            $data = 'Pas encore inscris';
            echo json_encode($data);
        }
    }

?>

 