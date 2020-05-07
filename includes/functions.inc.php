<?php
function pickMovie($id){
  if($id==1){
    $pickName="Aladdin";
  }elseif ($id==2) {
    $pickName = "Titanic";
  }elseif ($id==3) {
    $pickName="Avatar";
  }elseif ($id==4) {
    $pickName="Shawshank Redemtion";
  }elseif ($id==5) {
    $pickName="The Godfather";
  }
  return $pickName;
}

function buildLikes(){
  $likes=array(1=>0, 2=>0, 3=>0,4=>0,5=>0, );
  $dislikes=array(1=>0, 2=>0, 3=>0,4=>0,5=>0, );
  $userLikes=array(1=>0, 2=>0, 3=>0,4=>0,5=>0, );
  $userReviews=array(1=>0, 2=>0, 3=>0,4=>0,5=>0, );
    require 'dbh.inc.php';
    $sql = "SELECT * FROM likes";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../index.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = $result->fetch_assoc()) {
               $likes[$row["movieId"]]+=1;
               if(isset($_SESSION['userId']) && $row['userId']==$_SESSION['userId']){
                 $userLikes[$row["movieId"]]+=1;
               }
      }
    }

    $sql = "SELECT * FROM dislikes";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../index.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = $result->fetch_assoc()) {
               $dislikes[$row["movieId"]]+=1;
               if(isset($_SESSION['userId'])&&$row['userId']==$_SESSION['userId']){
                 $userLikes[$row["movieId"]]-=1;
               }
      }
    }
    $sql = "SELECT * FROM reviews";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../about.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = $result->fetch_assoc()) {
               $dislikes[$row["movieId"]]+=1;
               if(isset($_SESSION['userId']) &&$row['userId']==$_SESSION['userId']){
                 $userReviews[$row["movieId"]]=1;
               }
      }
    }



$_SESSION['userReviews']=$userReviews;
$_SESSION['userLikes']=$userLikes;
$_SESSION['dislikes']=$dislikes;
$_SESSION['likes']=$likes;
}
