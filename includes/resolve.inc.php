<?php
if (isset($_POST['resolve-submit'])) {
  require 'dbh.inc.php';

    $messageId = $_POST['messageId'];
    $resolved = true;
    $sql= "UPDATE messages SET resolved=? WHERE messageId=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../contact.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_bind_param($stmt, "sd", $resolved, $messageId);
      mysqli_stmt_execute($stmt);
      header("Location: ../contact.php?resolved=success");
      exit();
  }
}
?>
