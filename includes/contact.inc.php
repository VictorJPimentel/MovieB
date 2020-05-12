<?php
if (isset($_POST['contact-submit'])) {
  require 'dbh.inc.php';

    $userId = $_POST['userId'] ;
    $message = $_POST['message'];
    $resolved = false;
    $sql= "INSERT INTO messages( userId, message, resolved) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../contact.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_bind_param($stmt, "sss", $userId, $message, $resolved);
      mysqli_stmt_execute($stmt);

      $to_email = 'classictheatreaministrator@gmail.com';
      $subject = 'Contact Form Submit';
      $headers = 'From: noreply @ theclassic . com';
      $retval = mail($to_email,$subject,$message,$headers);
      if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      header("Location: ../contact.php?contact=success");
      exit();
  }
}
?>
