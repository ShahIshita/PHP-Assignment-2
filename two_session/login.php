<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["username"] = $username;

    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
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

<div class="container">
    <form class="myForm" id="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
    <label for="username">Username:</label>
        <input class="form-control input-lg" type="text" id="username" name="username" placeholder="username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input class="form-control input-lg" type="password" name="password" placeholder="password" required/>
    </div>
    <div class="form-group">
      <input type="submit" name="submit" class="btn btn-success btn-lg" value="Login" />
      <a class="btn btn-success btn-lg" href="home.html">Home</a>
    </div>
    
  </form>
</div>

</body>
</html>
