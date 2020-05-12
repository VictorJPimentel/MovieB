<div class="container-front">
  <div class="front-text">
    <h1>Welcome to The Classic</h1>
    <p>We are a local theatre that runs classic movies in a comfortable environment at an affordable price. Sign up or sign in to purchase tickets, leave reviews or contact us through the site.<br> Just browsing? Click <a id="embedded" href="./about.php">Now Showing</a> to learn about our theatre and view the movies we're currently showing.</p>
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
         <span class="register-letter">Repeat Password</span>
         <input class="input-normal" type="password" name="pwd-repeat" placeholder="Repeat Password" required>
         <input class="input-normal" type="submit" name="signup-submit" value="Sign Up">
       </div>
   </form>
 </div>';
 }
   ?>

</div>
