<?php require("header.php") ?>
<?php include("movie_search.php") ?>
<?php include("./includes/movie_search.inc.php") ?>
<?php
if(isset($_SESSION['num_available'])){

if (!isset($_SESSION['num_ticks'])) {
  
  $numAvaiable = $_SESSION['num_available'];
  $date = $_SESSION['date'];
  $time = $_SESSION['time'];
  $movieId = $_SESSION['movieId'];
  $movieName=pickMovie($movieId);
echo
'<div class="container-front">
 <div class="container-login">
   <form action="" method="post">
       <div class="col offset-6">
         <span class="register-letter"><h5>There are '.$numAvaiable.' tickets available for that showing of '.$movieName.'</h5></span>
          <input id="num_ticks" class="input-normal" type="number" name="num_ticks" min="1" value="1" max="'.$numAvaiable.'">
         <input class="input-normal" type="submit" name="num-submit" value="Choose">
       </div>
   </form></div>
  </div>';
}else{
  $num_ticks=$_SESSION['num_ticks'];
  $numAvaiable = $_SESSION['num_available'];
  $date = $_SESSION['date'];
  $time = $_SESSION['time'];
  $movieId = $_SESSION['movieId'];
  $movieName=pickMovie($movieId);
   echo
   '<div class="container-front">
    <div class="container-login">
      <form action="" method="post">
          <div class="col offset-6">
             <span class="register-letter"><h5>Please choose a type for each of your '.$num_ticks.' ticket/s for '.$movieName.'</h5></span>
             <input type="hidden" name="num_ticks" value="'.$num_ticks.'" readonly>
         <input type="hidden" name="movieId" value="'.$movieId.'" readonly>
         <input type="hidden" name="date" value="'.$date.'">
         <input type="hidden" name="time" value="'.$time.'">';
    for ($i=0; $i <$_SESSION['num_ticks']; $i++) {
    echo'
    <select class="input-normal tickettype" name="type'.$i.'">
      <option type="text" value="Adult">Adult - $5</option>
      <option type="text" value="Child">Child - $2</option>
      <option type="text" value="Student">Student - $3</option>
      <option type="text" value="Senior">Senior - $4</option>
    </select>';
    }
    echo' <span class="register-letter total"></span>
    <input class="input-normal" type="submit" name="purchase-submit" value="Purchase">
  </div>
  </form></div>
  </div>';
}


}


?>



    </div>
  <?php include("footer.php") ?>
  <div>
  </body>
</html>
