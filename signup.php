<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<body>

    <form action="forumskript.php" method="post">
        First Name:<br>
        <input type="text" name="fname">
        <br><br>
        Last Name:<br>
        <input type="text" name="lname">
        <br><br>
        Username: <br>
        <input type="text" name="username">
        <br><br>
        Password:<br>
        <input type="password" name="password">
        <br><br>
        Profile Picture:
        <input type="file" name="fileToUpload" value="Select file" id="fileToUpload">
        <input type="submit" value="Submit">
    </form>
      <br>
    <form action="login.php">
        <input type="submit" value="Login">
    </form>

    <?php
    session_start();
    $_SESSION["Value"] = "Signup";
    


    ?>
      
    
</body>
</html>