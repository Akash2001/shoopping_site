<?php
   session_start();
   require '../models/db.php';

    $con=createDb();
;
      if ($stmt = $con->prepare('SELECT password,fname,mname,lname FROM users WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"
	$stmt->bind_param('s',$_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
      
      if ($stmt->num_rows > 0) {
        $stmt->bind_result($password,$fname,$mname,$lname);
	$stmt->fetch();
	
	if ($_POST['password'] === $password) {
	        
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['fname'] = $fname;
		$_SESSION['mname'] = $mname;
		$_SESSION['lname'] = $lname;
		$_SESSION['email'] = $_POST['email'];
		header('Location: ../php/home.php');
	} else {
		// Incorrect password
		echo 'Incorrect email and/or password!';
	}
      } else {
	  // Incorrect username
	  echo 'Incorrect email and/or password!';
        }
        $stmt->close();
     }
    $con->close();
   
?>
