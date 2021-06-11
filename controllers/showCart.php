<?php
require '../models/db.php';
function showCart()
	{
		$con = createDb();

			$email = '\'' . $_SESSION['email'] . '\'';
			$sql1 = 'SELECT id FROM mobile_cart where email=' . $email;
			if ($result1 = $con->query($sql1)) {
				echo '<div class="row">';
				while ($row1 = $result1->fetch_row()) {
					$sql = 'SELECT id,name,price,description,imageName FROM mobiles where id=' . $row1[0];
					if ($result = $con->query($sql)) {
						while ($row = $result->fetch_row()) {
							echo '<div id="content" class="content col-lg-4 col-md-6 col-sm-12">
				  <div id="info"><br/>
				  <h4>' . $row[1] . '</h4><br/>
				  <img src="../images/' . $row[4] . '"/>
				  <div>' . $row[3] . '</div></br>
				  <div id="price">Price: ' . $row[2] . '</div>
				  </div></div>';
						}
					}
					$result->free_result();
				}
				$result1->free_result();
				echo '</div>';
			} else {
				echo 'Error';
			}
			$con->close();
		}
?>