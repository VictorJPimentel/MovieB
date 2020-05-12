<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container"><span class="nav-brand text-uppercase font-weight-bold">The Classic</span>
      <?php if ( isset($_SESSION['userId']) ) {
      echo '<span class="navbar text-uppercase font-weight-bold">Welcome '.$_SESSION['userUid'].'</span>'; }?>

        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"> <span class="navbar-toggler-icon popcorn-icon"></span></button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="./index.php" class="nav-link text-uppercase font-weight-bold">Home</a></li>
                <li class="nav-item"><a href="./about.php" class="nav-link text-uppercase font-weight-bold">Now Showing</a></li>
                <?php if ( isset($_SESSION['userId']) ) {
                  echo'
                <li class="nav-item"><a href="./ticketing.php" class="nav-link text-uppercase font-weight-bold">Ticketing</a></li>
                <li class="nav-item"><a href="./myMovies.php" class="nav-link text-uppercase font-weight-bold">My Movies</a></li>
                <li class="nav-item"><a href="./contact.php" class="nav-link text-uppercase font-weight-bold">Contact</a></li>';
                // echo '<li class="nav-item"><a href="./temporary.php" class="nav-link text-uppercase font-weight-bold">temporal</a></li>';
              }
      if ( !isset($_SESSION['userId']) ) {
        echo '<li class="nav-item"><form class="form-inline" action="includes/login.inc.php" method="post">
          <input type="text" class="form-control login-nav-in" name="mailuid" placeholder="Username" required">
          <input type="password" class="form-control login-nav-in" name="pwd" placeholder="Password" required>
        <input type="submit" class="btn" name="login-submit" value="Sign In">
        </form></li>';
      }else if ( isset($_SESSION['userId']) ) {
                  echo '<li class="nav-item"><form action="includes/logout.inc.php" method="post">
                        <input type="submit" class="btn" name="login-submit" value="Logout">
                        </form></li>';
                        // echo'<li class="nav-item"><a href="./userprofile.php" class="nav-link text-uppercase font-weight-bold">Profile</a></li>';
      }
      ?>
            </ul>
        </div>
    </div>
</nav>
