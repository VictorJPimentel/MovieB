<?php
if (isset($_POST['review-submit'])) {
  session_start();
  require 'dbh.inc.php';
    $userId = $_POST['userId'];
    $movieId = $_POST['movieId'];
    $reviewText = $_POST['reviewText'];

    $sql= "INSERT INTO reviews (movieId, userId, reviewText) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../contact.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_bind_param($stmt, "sss", $movieId, $userId, $reviewText);
      mysqli_stmt_execute($stmt);


      $_SESSION['userReviews'][$movieId]=1;
      header("Location: ../about.php?review=success");
      exit();
  }

}
