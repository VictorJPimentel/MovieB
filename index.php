    <?php require("header.php") ?>

    <?php
      if ( !isset($_SESSION['userId']) ) {
        echo '<div class="container-login">
          <form action="includes/login.inc.php" method="post">
              <div class="col">
                <span class="register-letter">Username or E-mail</span>
                <input type="text" name="mailuid" placeholder="Username/E-mail" required>
                <span class="register-letter">Password</span>
                <input type="password" name="pwd" placeholder="Password" required>
                <input type="submit" name="login-submit" value="Sign In">
              </div>
          </form>
        </div>';
      }
    ?>
    <?php include("signup.php") ?>
    </div>
    <div class="background background-2"></div>
    <div class="background background-3"></div>
   <div>
  </body>
</html>
