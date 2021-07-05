<?php
require '../models/db.php';
function readMobiles(){
    $con = createDb();
    $email= $_SESSION['email'];
      $sql = 'SELECT id,name,price,description,imageName FROM mobiles order by id';
      if ($result = $con->query($sql)) {
        echo '<div class="row">';
        while ($row = $result->fetch_row()) {
          echo '<div id="content" class="content col-lg-4 col-md-6 col-sm-12">
                  <div id="info"><br/>
                  <h4>' . $row[1] . '</h4><br/>
                  <img src="../images/' . $row[4] . '"/>
                  <div>' . $row[3] . '</div></br>
                  <div id="price">Price: ' . $row[2] . '</div>
                  </div>
                  <form id="form" method="post" action="toCart.php"?><div>Product Id:</div><input id="id" type="hideen" name="id" value="'.$row[0].'" readonly/><input type="submit" name="add" value="Add to cart"> </form>';
  
            $sql2 = 'SELECT email FROM mobile_cart where id='.$row[0];
            if ($result2 = $con->query($sql2)) {
              $row1=$result2->fetch_row();
              if($row1[0]==$email){
                echo "<center>Already added to cart</center>";
              }
            }
            $result2->free_result();
          echo '</div>';
        }
        echo '</div>';
        $result->free_result();
      }
      $con->close();
    }
?>