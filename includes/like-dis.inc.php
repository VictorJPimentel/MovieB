<?php
if (isset($_POST['like-submit'])) {
  session_start();
  require 'dbh.inc.php';
    $userId = $_POST['userId'];
    $movieId = $_POST['movieId'];

    $sql= "INSERT INTO likes (movieId, userId) VALUES (?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../contact.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_bind_param($stmt, "ss", $movieId, $userId);
      mysqli_stmt_execute($stmt);
      $_SESSION['likes'][$movieId]+=1;
      echo $userId, $movieId;
      header("Location: ../about.php?like=success");
      exit();
  }
}
?>
