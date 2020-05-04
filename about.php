<?php require("header.php") ?>

 <?php
 echo '<table style="width: 400px; overflow: auto;">';
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

       while($row = $result->fetch_assoc()) {
                $currentMovieId = $row["movieId"];
                echo
                 '<td><div class="container-login" style="margin-bottom:15px; ">
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

                     while($innerRow = $innerResult->fetch_assoc()) {
                       echo'<p style="color:black; margin:5px 50px 5px;">'.$innerRow['reviewText'].'</p>';
                     }
                   }
                   if($_SESSION['userReviews'][$currentMovieId]==0)echo '
                   <form action="includes/review.inc.php" method="post">
                        <span class="register-letter"><h6>Leave Review Here</h6></span>
                         <input type="hidden" name="userId" value="'.$_SESSION['userId'].'" readonly>
                         <input type="hidden" name="movieId" value="'.$currentMovieId.'" readonly>
                         <textarea class="input-normal" rows="6"  name="reviewText" placeholder="Enter text here"></textarea>
                         <input class="input-normal" type="submit" name="review-submit" value="Submit"></form>';




                   echo'</div>';
                   echo'</td>';
       }
   }



 }
   
   echo '</table>';
   ?>

</div>
<?php include("footer.php") ?>
<div>
</body>
</html>
