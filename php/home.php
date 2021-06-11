<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.html');
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link href="../css//bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/home.css" rel="stylesheet" type="text/css">
  <style>
    #homeLink{
      background-color: white;
    }
  </style>
</head>

<body class="loggedin">
<!---Navbar-->  
<?php require 'components/header.php' ?>

<div id="homeImg">
  <img src="../images/home.jpg"/>
</div>

<!-- Footer -->
<?php require 'components/footer.php'; ?>

</body>
<script src="../jquery/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>