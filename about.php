<?php require("header.php") ?>
<?php  echo '<div class="container-front">';?>
 <?php
 echo '<table style="width: 400px; overflow: auto; class="about">';
 if ( isset($_SESSION['userId']) ) {
     require './includes/dbh.inc.php';
     $userId= $_SESSION['userId'];
     $sql = "SELECT * FROM movies";
     $stmt = mysqli_stmt_init($conn);
     buildLikes();
     if(!mysqli_stmt_prepare($stmt, $sql)){
       header("Location: ../about.php?error=sqlerror");
       exit();
     }else {
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
   $add = 0;
       while($row = $result->fetch_assoc()) {
        $add++;
                $currentMovieId = $row["movieId"];
                echo
                 '<td><div id="container-login" style="margin-bottom:15px; ">
                   <form action="includes/like-dis.inc.php" method="post">
                       <div class="col">
                        <img id="moviePoster" src="images\poster_'.$currentMovieId.'.jpg" alt="">
                         <input type="hidden" name="userId" value="'.$_SESSION['userId'].'" readonly>
                         <input type="hidden" name="movieId" value="'.$currentMovieId.'" readonly>';
                  if($_SESSION["userLikes"][$currentMovieId]>=1){
                           echo '
                           <input class="input-normal" type="submit" name="like-submit" value="'.$_SESSION['likes'][$currentMovieId].' - Recommend" disabled>
                           <input class="input-normal" type="submit" name="dislike-submit" value="'.$_SESSION['dislikes'][$currentMovieId].' - Don\'t Recommend">';
                            }
                   else if($_SESSION["userLikes"][$currentMovieId]==-1){
                           echo '
                           <input class="input-normal" type="submit" name="like-submit" value="'.$_SESSION['likes'][$currentMovieId].' - Recommend">
                           <input class="input-normal" type="submit" name="dislike-submit" value="'.$_SESSION['dislikes'][$currentMovieId].' - Don\'t Recommend" disabled>';
                         }
                     else {
                             echo '
                             <input class="input-normal" type="submit" name="like-submit" value="'.$_SESSION['likes'][$currentMovieId].' - Recommend">
                             <input class="input-normal" type="submit" name="dislike-submit" value="'.$_SESSION['dislikes'][$currentMovieId].' - Don\'t Recommend">';
                    }
                         echo'
                       </div>
                   </form>';

                   $innerSql = "SELECT * FROM reviews WHERE movieId=?";
                   $innerStmt = mysqli_stmt_init($conn);
                   if(!mysqli_stmt_prepare($innerStmt, $innerSql)){
                     header("Location: about.php?error=sqlerror");
                     exit();
                   }else {
                     mysqli_stmt_bind_param($innerStmt, "s", $currentMovieId);
                     mysqli_stmt_execute($innerStmt);
                     $innerResult = mysqli_stmt_get_result($innerStmt);
                     if($innerResult->num_rows>0){
                     echo'<div class="container-table table-wrapper-scroll-y my-custom-scrollbar reviewscroll"><table class="table table-striped mb-0">';
                     while($innerRow = $innerResult->fetch_assoc()) {

                       $thirdSql = "SELECT username FROM users WHERE userid = ?";
                       $thirdStmt = mysqli_stmt_init($conn);
                       mysqli_stmt_prepare($thirdStmt, $thirdSql);
                       mysqli_stmt_bind_param($thirdStmt, "s", $innerRow['userId']);
                       mysqli_stmt_execute($thirdStmt);
                       $thirdResult = mysqli_stmt_get_result($thirdStmt);
                       $thirdRow = $thirdResult->fetch_assoc();

                       echo'<p style="color:black; margin:5px 15px 5px;">'.'<b>'.$thirdRow['username'].': </b>'.$innerRow['reviewText'].'</p>';

                     }
                     echo'</table></div>';
                   }else {
                     echo'<div class="container-table table-wrapper-scroll-y my-custom-scrollbar reviewscroll"><table class="table table-striped mb-0">';


                       echo'<p style="color:black; margin:5px 15px 5px;">'.'<b>Click below to leave the first review.<b></p>';


                     echo'</table></div>';
                     // code...
                   }
                   }
                   if($_SESSION['userReviews'][$currentMovieId]==0)echo '
                     <input class="input-normal reviewoption" type="submit" data-toggle="collapse" data-target="#collapseExample'.$add.'" aria-expanded="false" value="Review"><div class="collapse" id="collapseExample'.$add.'">
                     <div class="card card-body">
                   <form action="includes/review.inc.php" method="post">
                         <input type="hidden" name="userId" value="'.$_SESSION['userId'].'" readonly>
                         <input type="hidden" name="movieId" value="'.$currentMovieId.'" readonly>
                         <textarea class="input-normal" rows="6"  name="reviewText" placeholder="Leave Review Here"></textarea>
                         <input class="input-normal" type="submit" name="review-submit" value="Submit">
                    </form>
                        </div>
                         </div>';
                   echo'</div>';
                   echo'</td>';
       }
   }
 }else{
     require './includes/dbh.inc.php';
     $sql = "SELECT * FROM movies";
     $stmt = mysqli_stmt_init($conn);
     buildLikes();
     if(!mysqli_stmt_prepare($stmt, $sql)){
       header("Location: ../about.php?error=sqlerror");
       exit();
     }else {
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
       $add = 0;
       while($row = $result->fetch_assoc()) {
        $add++;
                $currentMovieId = $row["movieId"];
                echo
                 '<td><div id="container-login" style="margin-bottom:15px; ">
                       <div class="col">
                        <img id="moviePoster" src="images\poster_'.$currentMovieId.'.jpg" alt="">
                         <input type="hidden" name="movieId" value="'.$currentMovieId.'" readonly>
                         <input class="input-normal" type="submit" name="like-submit" value="'.$_SESSION['likes'][$currentMovieId].' - Recommend" diabled>
                         <input class="input-normal" type="submit" name="dislike-submit" value="'.$_SESSION['dislikes'][$currentMovieId].' - Don\'t Recommend" disabled>
                       </div>
                   ';
                   $innerSql = "SELECT * FROM reviews WHERE movieId=?";
                   $innerStmt = mysqli_stmt_init($conn);
                   if(!mysqli_stmt_prepare($innerStmt, $innerSql)){
                     header("Location: about.php?error=sqlerror");
                     exit();
                   }else {
                     mysqli_stmt_bind_param($innerStmt, "s", $currentMovieId);
                     mysqli_stmt_execute($innerStmt);
                     $innerResult = mysqli_stmt_get_result($innerStmt);
                     while($innerRow = $innerResult->fetch_assoc()) {
                       $thirdSql = "SELECT username FROM users WHERE userid = ?";
                       $thirdStmt = mysqli_stmt_init($conn);
                       mysqli_stmt_prepare($thirdStmt, $thirdSql);
                       mysqli_stmt_bind_param($thirdStmt, "s", $innerRow['userId']);
                       mysqli_stmt_execute($thirdStmt);
                       $thirdResult = mysqli_stmt_get_result($thirdStmt);
                       $thirdRow = $thirdResult->fetch_assoc();
                       echo'<p style="color:black; margin:5px 50px 5px;">'.'<b>'.$thirdRow['username'].': </b>'.$innerRow['reviewText'].'</p>';
                     }
                   }
                   echo'</div>';
                   echo'</td>';
       }
   }




 }

   echo '</table>';
    echo'</div>';
   ?>

</div>
<?php include("footer.php") ?>
<div>
</body>
</html>
