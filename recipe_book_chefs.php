<?php
session_start();

include('secret.php');
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=xnnujqmj_mybocuse;charset=utf8',$phpmalog, $phpmapasswd);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_POST['recipe_name']) && isset($_POST['date']) && !empty($_POST['recipe_name']) && !empty($_POST['date']))
{
  $recipe_name = $_POST['recipe_name'];
  $date = $_POST['date'];
  $fk_userid= $_POST['fk_userid'];
  
  $req = $bdd->prepare('INSERT INTO recipes (recipe_name, date, fk_userid) VALUES(:recipe_name, :date, :fk_userid)');

  $req->execute(array(
    'recipe_name' => $recipe_name,
    'date' => $date,
    'fk_userid' => $fk_userid
  ));

  header('Location: /recipe_book.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <!-- Baloo Bhai 2 font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">


</head>

<body>
  <!------------- Marie recipe page start------------->
  <header>
  <h2 id=recipetitleagenda>Agenda recipe</h2>
  </header>

  <main>
    <section class="tiles_group">

    <div class = studentdashboard>

<div class="tile is-ancestor">
    <div class="tile is-parent is-2" id=paddingmenu >
      <article class="tile is-child box has-background-black " id=menubar>
        <p class="title" id=titlemenu> my.</p>

    <!------------------------------LINK-TO-HOMEPAGE-------------------------------------->

        <figure class="homebutton" id=homebutton>
        <a href="chefdashboard.php"><img src="./asset/icons/home.png"></a>
      </figure>
       
     <!------------------------------LINK-TO-RECIPE-AGENDA------------------------------------->

      <figure class="calendarbutton" id=calendarbutton>
      <a href='recipe_book_chefs.php'><img src="./asset/icons/calendar.png"></a>
        
     </figure>

     
     <!------------------------------LINK-TO-LOGOUT------------------------------------->

    <figure class="logoutbutton">

      <a href='logout.php'><img src="./asset/icons/logout.png" id=logoutbutton></a>
      </figure>
      </article>
    </div> 


      <div class="tile is-ancestor">
        <div class="tile is-vertical is-parent is-8">
          <div class="tile is-child box">
            
<?php


 $reponse = $bdd->query('SELECT recipe_name, date, fk_userid FROM recipes');
  
  while ($donnees = $reponse->fetch())
  {
?>
    <p class="title">
  <?php echo $donnees['recipe_name']; ?>
    </p>

    <p class="subtitle">
<?php echo 'Date: ' . $donnees['date'] . ', 13:30'; ?>
</p> 
<p>
  <?php
  echo "coucou " . $donnees['fk_userid'];
  ?>
</p>
<br>
<?php


}$reponse->closeCursor();
?>
      
    
    <br>
    
    </div>

        </div>
        
      </div>

    </section>



<!------------- Marie modal recipe end ------------->


    
  <!------------------------------------------FOOTER------------------------------------------------------>
  <?php 
    include("footer.php");
    ?>


</body>

</html>

