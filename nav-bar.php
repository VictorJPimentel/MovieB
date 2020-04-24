<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container"><span class="nav-brand text-uppercase font-weight-bold">MovieB</span>
      <?php if ( isset($_SESSION['userId']) ) {
      echo '<span class="navbar text-uppercase font-weight-bold">Welcome '.$_SESSION['userUid'].'</span>'; }?>

        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"> <span class="navbar-toggler-icon popcorn-icon"></span></button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="./index.php" class="nav-link text-uppercase font-weight-bold">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">About</a></li>
                <li class="nav-item"><a href="./ticketing.php" class="nav-link text-uppercase font-weight-bold">Tickets</a></li>
                <li class="nav-item"><a href="./myMovies.php" class="nav-link text-uppercase font-weight-bold">My Movies</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
                    <?php
      if ( !isset($_SESSION['userId']) ) {
        echo '<li class="nav-item"><form class="form-inline" action="includes/login.inc.php" method="post">
        <div class="form-group mb-2">
          <label  class="sr-only">Email</label>
          <input type="text" class="form-control login-nav-in" name="mailuid" placeholder="Username" required">
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label  class="sr-only">Password</label>
          <input type="password" class="form-control login-nav-in" name="pwd" placeholder="Password" required>
        </div>
        <div class="form-group mx-sm-3 mb-2">
        <input type="submit" class="btn  mb-2" name="login-submit" value="Sign In">
        </div>
        </form></li>';
      }else if ( isset($_SESSION['userId']) ) {
                  echo '<li class="nav-item"><form action="includes/logout.inc.php" method="post">
                        <span><input  type="submit" class="btn  mb-2" name="logout-submit" value="Logout"></span>
                        </form></li>';
      }
      ?>
            </ul>
        </div>
    </div>
</nav>
