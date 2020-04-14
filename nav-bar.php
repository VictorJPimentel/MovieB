<nav class="navbar navbar-expand-lg py-3">
    <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">MovieB</a>
      <?php if ( isset($_SESSION['userId']) ) {
      echo '<span class="navbar-brand text-uppercase font-weight-bold">Welcome '.$_SESSION['userUid'].'</span>'; }?>

        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"> <span class="navbar-toggler-icon popcorn-icon"></span></button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="./index.php" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">HOT NOW</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Movies</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
                    <?php
      if ( !isset($_SESSION['userId']) ) {
        echo '<form class="form-inline" action="includes/login.inc.php" method="post">
        <div class="form-group mb-2">
          <label  class="sr-only">Email</label>
          <input type="text" class="form-control" name="mailuid" placeholder="Username" required">
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label  class="sr-only">Password</label>
          <input type="password" class="form-control" name="pwd" placeholder="Password" required>
        </div>
        <input type="submit" class="btn  mb-2" name="login-submit" value="Sign In">
        </form>';
      }else if ( isset($_SESSION['userId']) ) {
                  echo '<li class="nav-item"><form action="includes/logout.inc.php" method="post">
                        <span><input  type="submit" class="btn  mb-2" name="logout-submit" value="Logout"></span>
                        </form></li>';  }
                    ?>
            </ul>
        </div>
    </div>
</nav>
