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
              echo '<div style="display: flex; justify-content: center;"><div class="container-table"><table class="width:50%;; margin-top: 25px">
                  <tr><th class="cell colum1">ticketId</th>
                    <th class="cell colum2">movieId</th>
                    <th class="cell colum3">orderId</th>
                    <th class="cell colum4">movieDate</th>
                    <th class="cell colum5">movieTime</th>
                    <th class="cell colum6">type</th>
                    <th class="cell colum7">price</th>
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
                    <td class='cell'>".$innerRow["ticketId"]."</td>
                    <td class='cell'>".$movieName."</td>
                    <td class='cell'>".$innerRow["orderId"]."</td>
                    <td class='cell'>".$innerRow["movieDate"]."</td>
                    <td class='cell'>".$innerRow["movieTime"]."</td>
                    <td class='cell'>".$innerRow["type"]."</td>
                    <td class='cell'>".$innerRow["price"]."</td>
                    <tr>";
                }
              }
              echo '</table></div></div>';
    }
}
}
?>



    </div>
  <?php include("footer.php") ?>
  </body>
</html>