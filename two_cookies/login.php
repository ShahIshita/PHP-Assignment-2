<?php
    if(isset($_COOKIE['username'])){
        header("Location: index.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'ishita' && $password == '123456') {
            setcookie('username', $username, time() + 86400, '/');
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
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
<link rel="stylesheet" href="style/style.css">  
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
      <a class="btn btn-success btn-lg" href="home.php">Home</a>
    </div>
    
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
  </form>
</div>

</body>
</html>
