<?php


try
{
	$dbbocuse = new PDO('mysql:host=localhost;dbname=xnnujqmj_mybocuse;charset=utf8',$phpmalog, $phpmapasswd);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="dashboard.css" rel="stylesheet">
    <title> Dashboard </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  </head>
  <body>


<!---------------------------------------MENU----DASHBOARD---------------------------------------------->

<!------------------------------------------MENU----DASHBOARD------------------------------------------------->

   <div class = "studentdashboard">

    <div class="tile is-ancestor">
        <div class="tile is-parent is-2" id="paddingmenu" >
          <article class="tile is-child box has-background-black " id="menubar">
            <p class="title" id="titlemenu"> my.</p>

        <!------------------------------LINK-TO-HOMEPAGE-------------------------------------->

            <figure class="homebutton" id="hombebutton">
             <a href='studentdashboard.php'><img src="./asset/icons/home.png"></a>

          </figure>
           
         <!------------------------------LINK-TO-RECIPE-AGENDA------------------------------------->

          <figure class="calendarbutton" id="calendarbutton">
          <a href='recipe_book.php'><img src="./asset/icons/calendar.png"></a>

         </figure>


         <!------------------------------LINK-TO-LOGOUT------------------------------------->

        <figure class="logoutbutton">
        <a href='logout.php'><img src="./asset/icons/logout.png" id="logoutbutton"></a>

          </figure>
          </article>
        </div>  




<!---------------------------------------LEFT-SIDE-OF DASHBOARD---------------------------------------------->


<div class="tile is-parent is-5 is-vertical" id="leftsidedashboard">
            <article class="tile is-child box" id="namedashboard">
            <?php
            $student_req = $dbbocuse->prepare('SELECT email, firstname, lastname FROM users WHERE email = ?');
            $student_req->execute(array($_SESSION['email']));
  
  while ($donnees_student = $student_req->fetch())
  {
      ?>
              <p class="hichef">Hi 
<?php echo $donnees_student['firstname'] . ' ' . $donnees_student['lastname']; 
}$student_req->closeCursor();
?>

!</p>
              <p class="welcometext">It's good to see you again.</p>
              <figure class="profilepicturestudent">
                  <img src="./asset/images/student.png">
            </figure>
            </article>

            <article class="tile is-child box" id="attendancedashboard">
              <p class="attendancetitle">Attendance</p>
              <p class="encodetitle"> Encode your attendances on <br> your arrival and departure.</p>
              <button class="button is-black" id="attendancebutton">morning<br>09:00</button>
            </article>

           
            <div class="tile is-parent">

            <div class="tile is-parent" id="paddingabsences">
                <article class="tile is-child box" id="absencesdashboard">
                  <p class="absencehours">0</p>
                  <p class="unjustifiedabsences">Unjustified <br> absences</p>
                </article>
              </div>
              <div class="tile is-parent">
                <article class="tile is-child box" id="reviewdashboard">
                  <p class="reviewabsencebutton">Review past abcenses</p>
                </article>
              </div>
          </div>
        </div>   
          

<!---------------------------------------RIGHT-SIDE-OF DASHBOARD---------------------------------------------->

          <div class="tile is-parent">
          <div class="tile is-child" >
            <article class="tile is-child box is-8 is-vertical" id="quotedashboard">
              <p class="quotetitle">QUOTE </p>
              <p class="quote">"A recipe has no soul. You as the cook must bring soul to the recipe."</p>
              <div class="author">
                <p> - Thomas Keller </p>
              </div>
            </article>
            

            <div class="tile is-parent" id="therecette">
                <article class="tile is-child box" id="therecetteradius">
                  <p class="therecettetitle">The recette</p>
                  <p class="weekrecette">week of 11/01</p>

                  <ul>
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class= "recipe">  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    </li>
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class= "recipe">  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    </li> 
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class= "recipe">  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    </li>
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class="recipe">  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    </li>
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class= "recipe">  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    <a href="recipe_book.php"><button class="button is-black" id="agendabutton">the recettes' agenda</button></a>
              
                 <!------------------------------LINK-TO-RECIPE-AGENDA------------------------------------->
                    <!--<script type="text/javascript">
                     document.getElementById("agendabutton").onclick = function () {
                      location.href = 'recipe_book.php';
                        };
                    </script>-->
                 <!------------------------------LINK-TO-RECIPE-AGENDA------------------------------------->

                      </li>
                  
                   </ul>
                </article>
              </div>
           

            </div>
            
        </div>
    </div>


            
          </div>
        </div>

      

            
          </div>
          </div>

<!-----------------------------------------------FOOTER-------------------------------------------------------------->

<?php 
    include("footer.php");
    ?>
<script>
     const buttonAttendance = document.getElementById('attendancebutton');
     buttonAttendance.addEventListener('click', ()  => {
  attendancebutton.style.backgroundColor = "red";
  document.getElementById('attendancebutton').innerText = "Afternoon \n clock out";
  var heure = new Date().getHours();
       $.ajax({
        url : 'arrival.php?',
        type : 'POST', 
        data : 'heure =' + heure,
         success: function(result){
         console.log(result);
        }, error: function(result){
         console.log('error')
  }

     });

  })
 
  const buttonAbsence = document.getElementById('reviewdashboard');
  buttonAbsence.addEventListener('click', ()  => {
    buttonAbsence.classList.add("fondBlue");
       $.ajax({
        url : 'absence.php?',
        type : 'GET',
         success: function(data){
           document.getElementById('absencehours').innerText = data; 
           }, error: function(data){
         console.log(data);
  }

     });

  })

 </script>
  </body>
</html>
