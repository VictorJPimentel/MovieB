<?php
if (isset($_POST['search-submit'])) {
  require 'dbh.inc.php';
  $movieId = $_POST['movieId'];

  $date = $_POST['date'];
  $time = $_POST['time'];
  $movieName="";

  $sql = "SELECT * FROM tickets WHERE movieId=? && movieDate=? && movieTime=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../index.php?error=sqlerror");
    exit();
  }else {
    mysqli_stmt_bind_param($stmt, "sss", $movieId, $date, $time);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $htmlGo ="";
    $numAvaiable =null;
    $movieName = pickMovie($movieId);
    //  while ( $row = mysqli_fetch_assoc($result) ) {
         //echo "<p>". $row["movieName"].' '.$row["date"].' '.$row["time"]."</p>";
        //$htmlGo.="<p>". $row["movieId"].' '.$row["date"].' '.$row["time"]."</p>";
    //   }
    //header("Location: ticketing.php");
    //exit();
    $numAvaiable =  10 - mysqli_num_rows ( $result );
    $conn->close();
   }
}
if (isset($_POST['purchase-submit'])) {
  require 'dbh.inc.php';
    $movieId = $_POST['movieId'];

    $date = $_POST['date'];
    $time = $_POST['time'];
    $num_ticks = $_POST['num_ticks'];
    $newOrderId = "";
    $price =5.00;
    $type= "Elderly";
    $sql= "INSERT INTO orders( userId) VALUES (?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ./ticketing.php?error=sqlerror");
      exit();
    }else {

    mysqli_stmt_bind_param($stmt, "s", $_SESSION['userId']);
    mysqli_stmt_execute($stmt);
    $newOrderId = $conn->insert_id;
    //mysqli_stmt_close($stmt);
    //$conn->close();
    //header("Location: ./ticketing.php?purchase=success");
    //exit();

    $sql= "INSERT INTO tickets(movieId, orderId, movieDate, movieTime, type, price) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ./ticketing.php?error=sqlerrormakingtickets");
      exit();
    }else {

    mysqli_stmt_bind_param($stmt, "ssssss", $movieId, $newOrderId, $date, $time, $type, $price );

    for ($i=1; $i < $num_ticks; $i++) {
      mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: ./ticketing.php?purchase=success");
    exit();
    }


}
}
