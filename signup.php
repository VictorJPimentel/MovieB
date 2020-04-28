<div class="container-front">
  <div class="front-text">
    <h1>Book it then review it</h1>
    <p>Sign up or sign in to purchase tickets and food, leave reviews or contact us through the site.<br> Just browsing? Click About to learn about our theatre and view the movies we're currently showing.</p>
 </div>
 <?php
 if ( !isset($_SESSION['userId']) ) {
echo
 '<div class="container-login">
   <form action="includes/signup.inc.php" method="post">
       <div class="col">
         <span class="register-letter">Email</span>
         <input class="input-normal" type="text" name="mail"  placeholder="example@example.eg" required>
         <span class="register-letter">Username</span>
         <input class="input-normal" type="text" name="uid" placeholder="Username" required>
         <span class="register-letter">Password</span>
         <input class="input-normal" type="password" name="pwd" placeholder="Password" required>
         <span class="register-letter">Password</span>
         <input class="input-normal" type="password" name="pwd-repeat" placeholder="Repeat Password" required>
         <input class="input-normal" type="submit" name="signup-submit" value="Sign Up">
       </div>
   </form>
 </div>';
 }
   ?>

</div>
