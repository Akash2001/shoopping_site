<!DOCTYPE html>
<html>
    <head>
        <link href="../css/styles.css" rel="stylesheet" type="text/css">
        <style>
            *{
                color: white;
                text-align: center;
             }
        </style>
    </head>
    <body>
<?php
   echo "<br/><br/>";
   
   if(isset($_POST['submit'])){
       require '../models/db.php';
    $con=createDb();


    if($con->connect_errno)
    {
         echo"ERROR WHILE CONNECTING TO THE DATABASE !".$con->connect_error;
         exit();
    }else
    {
     
     $email= $_POST['email'];
     
     $query= "select * from users where email='$email'";
     $result= $con->query($query);
     
     if($result->num_rows>0){
         echo "<h4>The email is already in use try with another email</h4>";
     }else{
         $fname= $_POST['fname'];
         $mname= $_POST['mname'];
         $lname= $_POST['lname'];
         $password= $_POST['password'];
         
         $insert_query= "insert into users(fname,mname,lname,email,password) values('$fname','$mname','$lname','$email','$password')";
         
         if($con->query($insert_query)){
             echo "<h4>Welcome $fname $mname $lname!</h4>";
             echo"<br/><h4>Signed up successfully</h4><br/><br/>";
             echo " ";
         }else{
             echo "<h4>Something went wrong!</h4>";
         }
     }
    }
    $con->close();
   }  
?>

<div class="login"><br/><br/>
    <a href="../index.html">
        <div id="login_button" style="color:black">Login</div>
    </a><br /><br />
    <a href="../signup.html"><div id="login_button" style="color:black">Sign up</div></a><br/><br/>
</div>
    </body>
</html>
