<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<body>
    <?php
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DBname = "forum";
    $conn = new mysqli($servername, $username, $password, $DBname);
    $sql = "SELECT * FROM users (fname, lname, username, pass, pfp, time)";

    /*
    $fname = $_POST["fname"];
    $lname = $_SESSION["lname"];
    $username = $_SESSION["username"];
    $pfp = $_SESSION["pfp"];
    */

    echo 'You are logged in as: ' . '<b>' . $_SESSION['loginname'] . "<br>" .  "Username: " . $_SESSION["username"] . '<b>';
    echo '<h1>Welcome</h1>';
 

    echo "<br> <br>" . '<form method="post" action="??????HÄR SKA DET VARA">' . '<button type="submit">' . //Få denna knapp att köra linje 35 - 43.
     "Check if you are logged in" . '</button>' . '<form>' . "<br>";
    echo "<a href='uploadFile.php'>Upload a file</a>";

    if (isset($_SESSION["username"]) &&
    !empty($_SESSION["username"])) {
        echo "Du är inloggad som " . 
        $_SESSION["username"];
        echo '<form method="post" action="logoutPage.php">' . '<button type="submit">' . "Logout" . '</button>' . '<form>';
    }
    else{
        echo "Du är inte inloggad.";
    }

    echo "<p class=p_acc>Your account details:</p>" . "Name: " . "<br>" . "Email: " . "<br>" . "Website: " . "<br>" . "Comment: " . "<br><br>";

    echo "<br> <br>" . "Session started";
    echo "<br> <br>" . '<form method="post" action="checklogin.php">' . '<button type="submit">' .
     "Check if you are logged in" . '</button>' . '<form>' . "<br>";
    echo "<a href='uploadFile.php'>Upload a file</a>";





    ?>
    
</body>
</html>