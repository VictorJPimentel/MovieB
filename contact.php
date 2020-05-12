<?php require("header.php") ?>
<div class="container-front">
  <div class="front-text">
    <h1>Tell us what you think</h1>

    <p>Please enter your comment. Question or concern here and we will take care of the issuer and respond as soon as when we can.</p> </div>
 <?php
 if ( isset($_SESSION['userId']) ) {
echo
 '<div class="container-login">
   <form action="includes/contact.inc.php" method="post">
       <div class="col">
         <span class="register-letter"><h6>Leave Comment Here</h6></span>
         <textarea class="input-normal" rows="6"  name="message" placeholder="Enter text here"></textarea>
         <input type="hidden" name="userId" value="'.$_SESSION['userId'].'" readonly>
         <input class="input-normal" type="submit" name="contact-submit" value="Submit">
       </div>
   </form>
 </div></div>';
   require './includes/dbh.inc.php';
   $userId= $_SESSION['userId'];
   $movieName="";
   $resolved = false;
   $sql = "SELECT * FROM messages WHERE userId=? AND resolved=?";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: ../index.php?error=sqlerror");
     exit();
   }else {
     mysqli_stmt_bind_param($stmt, "ss", $userId, $resolved);
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
     $row_cnt = $result->num_rows;
     if($row_cnt){
     echo '<h1 style=" text-align: center; color:white; margin-top: 25px; margin-bottom: 25px">Your pending messages</h1>';
     echo '<div class="container-table table-wrapper-scroll-y my-custom-scrollbar"><table class="table table-striped mb-0" >
         <tr>
           <th class="cell colum3" id="messageCon" >Message Content</th>
           <th class="cell colum5" id="resolveIt" >Resolve Message?</th>
         </tr>';
     while($row = $result->fetch_assoc()) {

          echo '<tr><td class="cell">'.$row['message'].'</td><td>
                <form action="includes/resolve.inc.php" method="post">
                <input type="hidden" name="messageId" value="'.$row['messageId'].'" readonly>
                <input class="input-normal" type="submit" name="resolve-submit" value="Resolve">

          </form></td></tr>';
        }

       echo '</table></div>';
     }
 }

}
   ?>



</div>
<?php include("footer.php") ?>
<div>
</body>
</html>
