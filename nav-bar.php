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
                <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold"><span class=""></span> Login</a></li>
                <!-- <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold"><span class="sign-list"><span class="navbar-toggler-icon nav-icon user-icon"></span> Sign Up</span></a></li> -->
                <?php if ( isset($_SESSION['userId']) ) {
                  echo '<li class="nav-item"><form action="includes/logout.inc.php" method="post">
                        <span class="sign-list"><span class="navbar-toggler-icon nav-icon user-icon"></span><button  type="submit" name="logout-submit">Logout</button></span>
                        </form></li>';  }
                    ?>
            </ul>
        </div>
    </div>
</nav>
