<?php
session_start();

if (isset($_SESSION['user_name'])) {
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
<link rel="stylesheet" href="style/style.css">  
</head>

<body>

  <div class="container">
  <form class="myForm" id="registerForm" onsubmit="submitForm(event)">
    <div class="form-group">
    <label for="username">Username:</label>
        <input class="form-control input-lg" type="text" id="username" name="username" placeholder="username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input class="form-control input-lg" type="password" name="password" placeholder="password" required/>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Register</button>
      <a class="btn btn-primary" href="home.php">Home</a>
    </div>
  </form>
</div>

</body>
</html>


<script>
  function submitForm(event) {
    event.preventDefault();
    const formData = new FormData(document.getElementById("registerForm"));

    $.ajax({
      type: "POST",
      url: "./data/register.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        const responseData = JSON.parse(response);
        $("#output").html(`<div class="alert alert-success">${responseData.message}</div>`);
        window.location.href = 'home.php';
        clearForm();
      },
      error: function(_, _2, err) {
        $("#output").html('<div class="alert alert-danger">Error: ' + err + '</div>');
      }
    });
  }

  function clearForm() {
    document.getElementById("registerForm").reset();
  }
</script>

</body>
</html>
