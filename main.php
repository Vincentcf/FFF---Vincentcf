<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
session_start();

if (isset($_POST['login'])) { // Displays Login form when the button gets a value

  $_SESSION["Value"] = "login";

  echo '
  <form action="forumskript.php" method="post">
    Username:<br>
    <input type="text" name="username">
    <br><br>
    Password:<br>
    <input type="password" name="password">
    <br><br> 
    <input type="submit" value="Log In">
  </form>
  <br><br>
  
  <form method="post">
    <input type="submit" id="signup" name="signup" value="Sign up">
  </form>';

  $_SESSION["password"] = "true";

  if (isset($_SESSION["Failed"]) && $_SESSION["Failed"] == "true"){

    echo "<h3 style='color:red'>Wrong username or password!</h3>";
    
   
  } else {

    return;
  
  }


} elseif (isset($_POST['signup']) or isset($_SESSION['signupcheck'])) { // Displays signup form when the button gets a value

  $_SESSION["Value"] = "signup"; 
 
  echo '
  <form action="forumskript.php" method="post" enctype="multipart/form-data">
    First Name:<br>
    <input type="text" id="fname" name="fname" required>
    <br><br>
    Last Name:<br>
    <input type="text" id="lname" name="lname" required>
    <br><br>
    Username: <br>
    <input type="text" id="username" name="username" required>
    <br><br>
    Password:<br>
    <input type="password" id="password" name="password" required>
    <br><br>
    Profile Picture:
    <input type="file" name="fileToUpload" value="Select file" id="fileToUpload" required>
    <br><br>
    <input type="submit" name="register" value="Register">
  </form><br><br>
  <form method="post">
    <input type="submit" id="login" name="login" value="Log In"> 
  </form>';
  // Does different checks to make sure image is allowed
  if (isset($_SESSION["Failed"])){

    if ($_SESSION["Failed"] == "filledOut"){ // Only allows certain formats

      echo "<h3 style='color:red'>Make sure to fill out entire form</h3>";

    } else if ($_SESSION["Failed"] == "size"){ // Checks so file is not too big

        echo "<h3 style='color:red'>Your file is too large</h3>";
        
    } else if ($_SESSION["Failed"] == "format"){ // Only allows certain formats

        echo "<h3 style='color:red'>Only JPG, JPEG, PNG & GIF files are allowed</h3>";
        
    } else if ($_SESSION["Failed"] == "falsecheck"){ // Checks if file is an image

      echo "<h3 style='color:red'>File is not an image</h3>";
      
    } else {

        return;

    }
  }

} else { // Displays signup or login button only before one of them gets assigned a value

  echo '    <h1>Welcome to this forum!</h1>
    
  <form method="post">
      <input type="submit" id="login" name="login" value="Login">
      <br><br>
      <input type="submit" id="signup" name="signup" value="Sign up">

  </form>';
  
}

$_SESSION["Failed"] = "false";
unset($_SESSION['signupcheck']);

?>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/contact.js"></script>

</body>
</html>
