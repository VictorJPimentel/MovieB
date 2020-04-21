<?php require("header.php") ?>
<?php include("movie_search.php") ?>
<?php include("./includes/movie_search.inc.php") ?>
<?php
if(isset($numAvaiable)){

echo '<div class="container-front">
 <div class="container-login">
   <form action="" method="post">
       <div class="col offset-6">
         <span class="register-letter"><h5>There are '.$numAvaiable.' tickets available for that showing of '.$movieName.'</h5></span>
         <input type="hidden" name="movieId" value="'.$movieId.'" readonly>
         <input type="hidden" name="date" value="'.$date.'">
         <input type="hidden" name="time" value="'.$time.'">
         <span class="register-letter">How many tickets?</span>
         <input class="input-normal" type="number" name="num_ticks" min="1" value="1" max="'.$numAvaiable.'">
         <input class="input-normal" type="submit" name="purchase-submit" value="Purchase">
       </div>
   </form>
 </div>
</div>';
}
if (isset($newOrderId)) {
echo $newOrderId;
}
?>



    </div>
    <div class="background background-2"></div>
    <div class="background background-3"></div>
  <?php include("footer.php") ?>
  <div>
  </body>
</html>
