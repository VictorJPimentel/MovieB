<?php require("header.php") ?>
<div class="container-front">
  <div class="front-text">
    <h1>Tell us what you think</h1>
    <p>Please enter your comment. Question or concern here and we will take care of the issuer and respond as soon as when we can.</p> </div>
 <?php
 if ( isset($_SESSION['userId']) ) {
echo
 '<div class="container-login">
   <form action="includes/contact.inc.php" method="post">
       <div class="col">
         <span class="register-letter"><h6>Leave Comment Here</h6></span>
         <textarea class="input-normal" rows="6"  name="message" placeholder="Enter text here"></textarea>
         <input type="hidden" name="userId" value="'.$_SESSION['userId'].'" readonly>
         <input class="input-normal" type="submit" name="contact-submit" value="Submit">
       </div>
   </form>
 </div>';
 }
   ?>

</div>
</div>
<?php include("footer.php") ?>
<div>
</body>
</html>
