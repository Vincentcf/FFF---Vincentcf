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

    echo "<br> <br>" . "Session started" . "<br><br>";

    echo 'You are logged in as: ' . '<b>' . $_SESSION['loginname'] . "<br>" .  "Username: " . $_SESSION["username"] . '<b>';
    echo '<h1>Welcome</h1>';
 
    echo "<br> <br>" . '<form method="post" action="createThread.php">' . '<button type="submit">' .
    "Create new thread" . '</button>' . '<form>' . "<br>";
    echo "<a href='uploadFile.php'>Upload a file</a>";
   /* echo "<p class=p_acc>Your account details:</p>" . "Name: " . "<br>" . "Email: " . "<br>" . "Website: " . "<br>" . "Comment: " . "<br><br>"; */


   
 

    echo "<table class=threads>";
    echo "<tbody>"; 
    echo "<tr class=threadRow>" . "<th>  </th>" . "<th>Nr</th>" . "<th>Rubrik</th>" . "<th>Skapad av</th>" . "<th>Senaste inlägg</th>" . "</tr>";
    echo "<tr class=threadRow>" . "<th>  </th>" . "<th>Nr</th>" . "<th>Rubrik</th>" . "<th>Skapad av</th>" . "<th>Senaste inlägg</th>" . "</tr>";
    echo "<tr class=threadRow>" . "<th>  </th>" . "<th>Nr</th>" . "<th>Rubrik</th>" . "<th>Skapad av</th>" . "<th>Senaste inlägg</th>" . "</tr>";
    echo "<tr class=threadRow>" . "<th>  </th>" . "<th>Nr</th>" . "<th>Rubrik</th>" . "<th>Skapad av</th>" . "<th>Senaste inlägg</th>" . "</tr>";



    ?>
    
</body>
</html>