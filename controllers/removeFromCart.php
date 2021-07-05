<?php
require '../models/db.php';
session_start();
    if(isset($_POST['remove'])){
        $con= createDb();

         $email= '\''.$_SESSION['email'].'\'';
         $id= $_POST['id'];
    
         $sql = 'DELETE FROM mobile_cart where id='.$id.' AND email='.$email;
         echo $email;
              if ($con->query($sql)) {
                  header('Location: ../php/profile.php');
                  exit;  
              }else{
                 echo "<h4>Something went wrong!</h4>";
             }
        }
        $con->close();
?>