<?php require("header.php") ?>
<div class="container-front">
  <div class="front-text">

 <?php
 if ( isset($_SESSION['userId']) ) {
     require './includes/dbh.inc.php';
     $userId= $_SESSION['userId'];
     $sql = "SELECT * FROM movies";
     $stmt = mysqli_stmt_init($conn);
     buildLikes();
     if(!mysqli_stmt_prepare($stmt, $sql)){
       header("Location: ../index.php?error=sqlerror");
       exit();
     }else {
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);

       while($row = $result->fetch_assoc()) {
                $currentMovieId = $row["movieId"];
                echo
                 '<div class="container-login">
                   <form action="includes/like-dis.inc.php" method="post">
                       <div class="col">
                        <img id="moviePoster" src="images\poster_'.$currentMovieId.'.jpg" alt="">
                         <span class="register-letter">'.$_SESSION['likes'][$currentMovieId].'</span>
                         <input type="hidden" name="userId" value="'.$_SESSION['userId'].'" readonly>
                         <input type="hidden" name="movieId" value="'.$currentMovieId.'" readonly>
                         <input class="input-normal" type="submit" name="like-submit" value="Likes - '.$_SESSION['likes'][$currentMovieId].'">
                         <input class="input-normal" type="submit" name="dislike-submit" value="Dislike">
                       </div>
                   </form>
                 </div>';

       }
   }



 }
   ?>

   </div>
</div>
</div>
<?php include("footer.php") ?>
<div>
</body>
</html>
