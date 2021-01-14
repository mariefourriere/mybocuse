
  
<!------------------------------------------MENU----DASHBOARD------------------------------------------------->

   <div class = studentdashboard>

    <div class="tile is-ancestor">
        <div class="tile is-parent is-2" id=paddingmenu >
          <article class="tile is-child box has-background-black " id=menubar>
            <p class="title" id=titlemenu> my.</p>

        <!------------------------------LINK-TO-HOMEPAGE-------------------------------------->

            
          <div  class="iconbutton" id=hombebutton>
             <i class="fas fa-home"></i>
          </div>

         <!------------------------------LINK-TO-RECIPE-AGENDA------------------------------------->

         <div  class="iconbutton" id=calendarbutton>
             <i class="fas fa-calendar"></i>
          </div>


         <!------------------------------LINK-TO-LOGOUT------------------------------------->
          <div  class="iconbutton">
             <i class="fas fa-sign-out-alt"></i>
          </div>
          </article>
        </div>  

<!---------------------------------------LEFT-SIDE-OF DASHBOARD---------------------------------------------->


<div class="tile is-parent is-5 is-vertical" id=leftsidedashboard>
            <article class="tile is-child box allBoxGrey" id=namedashboard>
              <p class="histudent" >Hi Prénom Nom!</p>
              <p class="welcometext">It's good to see you again.</p>
              <figure class="profilepicturestudent">
                  <img src="../mybocuse-test/asset/images/student.png">
            </figure>
            </article>
            <h3 class="attendancetitle">Attendance</h3>
            <article class="tile is-child box allBoxGrey" id=attendancedashboard>
              
              <p class="encodetitle"> Encode your attendances on <br> your arrival and departure.</p>
              <button class="button is-large is-black rightSide" id=attendancebutton>morning<br>clock in</button>
            </article>

           
            <div class="tile is-parent">

            <div class="tile is-parent" id=paddingabsences>
                <article class="tile is-child box allBoxGrey absence" id=absencesdashboard>
                  <p class="absencehours">0</p>
                  <p class="unjustifiedabsences">Unjustified <br> absences</p>
                </article>
              </div>
              <div class="tile is-parent">
                <article class="tile is-child box allBoxBlack" id=reviewdashboard>
                  <p class="reviewabsencebutton">Review past abcenses</p>
                </article>
              </div>
          </div>
        </div>   
          

<!---------------------------------------RIGHT-SIDE-OF DASHBOARD---------------------------------------------->

          <div class="tile is-parent">
          <div class="tile is-child" >
            <article class="tile is-child box is-8 is-vertical" id=quotedashboard>
              <p class="quotetitle">QUOTE </p>
              <p class="quote">"A recipe has no soul. You as the cook must bring soul to the recipe."</p>
              <div class="author">
                <p> - Thomas Keller </p>
              </div>
            </article>
            

            <div class="tile is-parent" id=therecette>
                <article class="tile is-child box allBoxGrey" id=therecetteradius>
                  <p class="therecettetitle">The recette</p>
                  <p class="weekrecette">week of 11/01</p>

                  <ul>
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class= recipe>  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    </li>
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class= recipe>  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    </li> 
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class= recipe>  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    </li>
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class= recipe>  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    </li>
                    <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek">Monday </p>
                            <p class= recipe>  Tarte aux fraises </p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    <button class="button is-black" id=agendabutton>the recettes' agenda</button>
              
                 <!------------------------------LINK-TO-RECIPE-AGENDA------------------------------------->
                    <script type="text/javascript">
                     document.getElementById("agendabutton").onclick = function () {
                      location.href = 'recipe_book.php';
                        };
                    </script>
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
 <script>
     const buttonAttendance = document.getElementById('attendancebutton');
     buttonAttendance.addEventListener('click', ()  => {
  attendancebutton.style.backgroundColor = "red";
  document.getElementById('attendancebutton').innerText = "Afternoon \n clock out";
  var heure = new Date().getHours();
       $.ajax({
        url : './include/arrival.php?',
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
        url : './include/absence.php?',
        type : 'GET',
         success: function(data){
         console.log(data);
        }, error: function(data){
         console.log(data);
  }
        
     });

  })
  
 </script>
