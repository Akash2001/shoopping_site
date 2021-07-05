<?php
require '../models/db.php';
function addToCart(){
    if(isset($_POST['add'])){
        $con= createDb();

         $email= $_SESSION['email'];
         $id= $_POST['id'];
    
         $sql = 'SELECT email FROM mobile_cart where id='.$id;
              if ($result = $con->query($sql)) {
                $row = $result->fetch_row();
                if($row[0]==$email){
                  header('Location: mobile.php');
                  exit;  
                }
              }
              $result->free_result();
    
             $insert_query= "insert into mobile_cart(id,email) values($id,'$email')";
             
             if($con->query($insert_query)){
                header('Location: mobile.php');
             }else{
                 echo "<h4>Something went wrong!</h4>";
             }
        }
        $con->close();
       }
?>