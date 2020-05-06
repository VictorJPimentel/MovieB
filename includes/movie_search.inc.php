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
    $movieName=pickMovie($movieId);
    //while ( $row = mysqli_fetch_assoc($result) ) {
         //echo "<p>". $row["movieName"].' '.$row["date"].' '.$row["time"]."</p>";
        //$htmlGo.="<p>". $row["movieId"].' '.$row["date"].' '.$row["time"]."</p>";
    //   }
    //header("Location: ticketing.php");
    //exit();
    unset($_SESSION['num_ticks']);
    $numAvaiable =  10 - mysqli_num_rows ( $result );
    $_SESSION['num_available']=$numAvaiable;
    $_SESSION['date'] = $date;
    $_SESSION['time'] = $time;
    $_SESSION['movieId'] = $movieId;
    $conn->close();
   }
}

if (isset($_POST['num-submit'])) {
  $num_ticks=$_POST['num_ticks'];
  $_SESSION['num_ticks']=$num_ticks;

}

if (isset($_POST['purchase-submit'])) {
  require 'dbh.inc.php';
    $movieId = $_POST['movieId'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $num_ticks = $_POST['num_ticks'];
    $newOrderId = "";

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

        for ($i=0; $i < $num_ticks; $i++) {
          $type= $_POST['type'.$i];
          if($type=='Adult')
              $price=5.00;
            else if($type == 'Child')
              $price=2.00;
            else if($type == 'Senior')
              $price=4.00;
            else if($type == 'Student')
              $price=3.00;

          mysqli_stmt_bind_param($stmt, "ssssss", $movieId, $newOrderId, $date, $time, $type, $price );
          mysqli_stmt_execute($stmt);
        }

        unset($_SESSION['num_ticks']);
        unset($_SESSION['num_available']);
        unset($_SESSION['date']);
        unset($_SESSION['time']);
        unset($_SESSION['movieId']);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ./myMovies.php?purchase=success");
        exit();
      }
  }
}
