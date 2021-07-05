<?php

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Update profile</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>



<body>
    <div class="login">
        <h1>Update profile</h1>
        <form method="post" action="../controllers/updateProfile.php">
            <label>
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="fname" placeholder="First name" id="username" value=<?= $_SESSION['fname'] ?> required>

            <label>
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="mname" placeholder="Middle name" id="username" value=<?= $_SESSION['mname'] ?> required>

            <label>
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="lname" placeholder="Last name" id="username" value=<?= $_SESSION['lname'] ?> required>

            <label>
                <centre>Email</centre>
            </label>
            <input type="text" name="email" placeholder="Email" id="username" value=<?= $_SESSION['email'] ?> required><br />

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="text" minlength="8" name="password" placeholder="Password" id="password" value=<?= $_SESSION['password'] ?> required><br /><br />
            <input type="submit" name="submit" value="Update">
        </form><br /><br />

    </div>
</body>

</html>