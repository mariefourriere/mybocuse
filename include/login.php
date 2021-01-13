<div id="titlebox">
<figure class="mage is-16by9">
  <img src="titre.png">
</figure>
</div>
<?php if ($_SESSION['logged'] == true) {
    echo "<p style='visibility: visible;' id='loginFailed'>Login failed !</p>";
 } else {
    echo "<p style='visibility: hidden;'>Login failed !</p>";
 } ?>

 <div class="flex">
<div id="imagebox">
<figure class="image is-1by1">
  <img src="chef.png">
</figure>
</div>
<form method="post" action="" class="flex">
<div class="emailbox">
  <div method="post" action="" class="email">
  <div class="control">
  <div class="field">
  <label class="label"><span id="mailError" class="error">Invalid input, please try again</span></label>
  <div class="control has-icons-left has-icons-right">
  <input class="input" name="email" id="email" type="email" placeholder="Email">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
    
 
    

<div class="field">
  <p class="control has-icons-left">
  <label class="label"><span id="pwdError" class="error">This password is invalid, please try again</span></label>
  <input class="input" name="password" id="password" type="password" placeholder="PASSWORD">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
</div>


    <!-- <button type="submit" name="submit" id="submit" disabled>Valider</button> -->
    <input type="submit" name="submit" id="submit" value="LOGIN" disabled>
</form>
  </div>
<script src="script.js"></script> 
