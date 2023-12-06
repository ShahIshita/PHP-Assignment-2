<?php
    // Check if the user is not logged in via cookie, redirect to login page
    if(!isset($_COOKIE['username'])){
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <title>Home</title>
    <style>
    .myForm {
        min-width: 500px;
        position: absolute;
        text-align: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2.5rem
    } 
 @media (max-width: 500px) {
   .myForm {
       min-width: 90%;
      }
   }
  </style>
</head>
<body>
    <div class="myForm">
    <h1>Welcome, <?php echo $_COOKIE['username']; ?>!</h1>
    <a href="logout.php">Logout</a>
    <div>
</body>
</html>
