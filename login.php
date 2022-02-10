<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="forumskript.php" method="post">
        Username:<br>
        <input type="text" name="username">
        <br><br>
        Password:<br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" value="Submit">
      </form>
      <br><br>
      <form action="signup.php">
        <input type="submit" value="Sign up">
    </form>


      <?php
      session_start();
      $_SESSION["Value"] = "Login";
      
      if (isset($_SESSION["Failed"]) && $_SESSION["Failed"] == "true"){

          echo "<h3 style='color:red'>Wrong username or password!</h3>";

      } else {

          return;
        
        }

        $_SESSION["Failed"] = "false";
      
      ?>


    
</body>
</html>