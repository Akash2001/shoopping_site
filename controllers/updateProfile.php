<?php
session_start();
   require '../models/db.php';

    $con=createDb();

    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $current_email=$_SESSION['email'];

        $sql="UPDATE users 
              set fname='$fname',
                  mname='$mname',
                  lname='$lname',
                  email='$email',
                  password='$password' 
              where email='$current_email'";

        if ($con->query($sql)) {
		     $_SESSION['fname'] = $fname;
		     $_SESSION['mname'] = $mname;
		     $_SESSION['lname'] = $lname;
		     $_SESSION['email'] = $email;
		     $_SESSION['password'] = $password;
             $_SESSION['profile-status']="Profile Updated";

             header('Location: ../php/profile.php');
             exit; 
        }
    }
?>