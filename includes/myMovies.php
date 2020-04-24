<?php require("header.php") ?>
<?php
if (isset($_SESSION['userId'])) {
  require './includes/dbh.inc.php';
  $userId= $_SESSION['userId'];
  $movieName="";
  echo '<h1 style=" text-align: center; color:white; margin-top: 25px;">We have these movie tickets reserved for you '.$_SESSION['userUid'].'</h1>';
  $sql = "SELECT * FROM orders WHERE userId=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../index.php?error=sqlerror");
    exit();
  }else {
    mysqli_stmt_bind_param($stmt, "s", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = $result->fetch_assoc()) {
              echo '<table style="margin-left: 25%; width:50%; color: white; margin-top: 25px">
                  <tr><th>ticketId</th>
                    <th>movieId</th>
                    <th>orderId</th>
                    <th>movieDate</th>
                    <th>movieTime</th>
                    <th>type</th>
                    <th>price</th>
                  </tr>';
              $currentOrderId = $row["orderId"];
              $innerSql = "SELECT * FROM tickets WHERE orderId=?";
              $innerStmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($innerStmt, $innerSql)){
                header("Location: ../myMovies.php?error=innersqlerror");
                exit();
              }else {
                mysqli_stmt_bind_param($innerStmt, "s", $currentOrderId);
                mysqli_stmt_execute($innerStmt);
                $innerResult = mysqli_stmt_get_result($innerStmt);
                while($innerRow = $innerResult->fetch_assoc()) {
                  $movieId=$innerRow["movieId"];
                  $movieName = pickMovie($movieId);
                  echo "<tr>
                    <td>".$innerRow["ticketId"]."</td>
                    <td>".$movieName."</td>
                    <td>".$innerRow["orderId"]."</td>
                    <td>".$innerRow["movieDate"]."</td>
                    <td>".$innerRow["movieTime"]."</td>
                    <td>".$innerRow["type"]."</td>
                    <td>".$innerRow["price"]."</td>
                    <tr>";
                }
              }
              echo '</table>';
    }
}
}
?>



    </div>
    <div class="background background-2"></div>
    <div class="background background-3"></div>
  <?php include("footer.php") ?>
  </body>
</html>
