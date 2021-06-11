<!DOCTYPE html>
<html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit;
}
?>

<head>
	<meta charset="utf-8">
	<title>Profile Page</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link href="../css//bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/home.css" rel="stylesheet" type="text/css">
	<style>
    #profileLink{
      background-color: white;
    }
  </style>
</head>

<body class="loggedin">
	<!---Navbar--->
	<?php require 'components/header.php'; ?>

	<div id="profile" class="content">
		<h3>Your Profile</h3>
		<div>
			<p>Your account details are below:</p>
			<table>
				<tr>
					<td>First Name:</td>
					<td><?= $_SESSION['fname'] ?></td>
				</tr>
				<tr>
					<td>Middle Name:</td>
					<td><?= $_SESSION['mname'] ?></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><?= $_SESSION['lname'] ?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?= $_SESSION['email'] ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div><br />
		<h4>Your cart!<h4>
	</div>

	<?php
	require '../controllers/showCart.php';
	showCart();
	?>
	<!-- Footer -->
	<?php require 'components/footer.php'; ?>
</body>
<script src="../jquery/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>