<?php
    include('secret.php');

    $dbbeaucuz = new PDO('mysql:host=localhost;dbname=mybocuse', $phpmalog, $phpmapasswd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $response = $dbbeaucuz->query('SELECT userid, email, passwd FROM users');
    while($datas = $response->fetch()){
        $originpw = $datas['passwd'];
        $hash = password_hash($originpw, PASSWORD_DEFAULT);
        echo '<p>' . $datas['email'] . $hash . '</p>';
        // $originpw = password_verify('dwaynejohnson', $hash);
        // echo $originpw;
        if (password_verify('saumon', $hash)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
    }

    // $request = $dbbeaucuz->prepare("UPDATE `users` SET `passwd` = 'audreygilmant' WHERE `users`.`userid` = 1;");
    // $request->execute(array());
?>