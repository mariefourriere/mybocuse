<?php
    include('secret.php');

    $dbbeaucuz = new PDO('mysql:host=localhost;dbname=xnnujqmj_mybocuse;charset=utf8',$phpmalog, $phpmapasswd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $response = $dbbeaucuz->query('SELECT userid, email, password FROM users');
    while($datas = $response->fetch()){
        $originpw = $datas['password'];
        // $hash = password_hash($originpw, PASSWORD_DEFAULT);
        echo '<p>' . $datas['email'] . $originpw . '</p>';
        // $originpw = password_verify('dwaynejohnson', $hash);
        // echo $originpw;
        if (password_verify('vindiesel', $originpw)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
    }

    // $request = $dbbeaucuz->prepare("UPDATE `users` SET `passwd` = 'audreygilmant' WHERE `users`.`userid` = 1;");
    // $request->execute(array());
?>