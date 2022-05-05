<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>createThread.php</title>
</head>
<body>
<a class="btn btn-primary" href="index.php" role="button">Go back</a>
    

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum";
$conn = new mysqli($servername, $username, $password, $dbname);

echo '<h1>Welcome</h1>';

echo 'You are logged in as: ' . '<b>' . $_SESSION['loginname'] . "<br>" .  "Username: " . $_SESSION["username"] . '</b><br><br>';

$username = $_SESSION["username"];
$title = $_POST["title"];
$descr = $_POST["descr"];
$uploadedFile = $_POST["uploadedFile"];
$sql = "INSERT INTO threads (username, title, descr, uploadedFile) 
        VALUES ('$username', '$title', '$descr', '$uploadedFile')";
$conn->query($sql);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else {
      echo "<p class=connec_yes>Posted successfully</p><br>";
      $sql = "SELECT * FROM threads";
      $result = $conn->query($sql);
      echo "<p class=postedThread>Your posted thread:</p>" . "Title: " . $_POST["title"] . "<br>" . "Description: " . $_POST["descr"] . "<br>" . "Filename: " . $_POST["uploadedFile"] . "<br><br>";
    
    /*
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p class=p_acc>Previous threads:</p>" . "Title:" . $row["title"] . "<br>" . "Description: " . $row["description"] . "<br>" . "Contact info: " . $row["contactInfo"] . "<br><br>"; // . $row["uploadedFile"] $row["uploadTime"] .
            }
        }
        */
    }

/*
echo '<form action="threadConfirmation.php" method="post">
<input type="text" name="title" placeholder="Title"> <br>
<input type="text" name="description" placeholder="Description"> <br>
<input type="tel" name="contactInfo" placeholder="Contact info"> <br>
<input type="text" name="uploadedFile" placeholder="(Lägg till ladda upp fil)"> <br>
<input type="submit" value="Submit">
</form>';
*/





/* 
WEBBSERV SQL PHP FORUM TABLE COMMANDS

CREATE TABLE users (
    fname varchar(50),
    lname varchar(50),
    username varchar(60),
    pass varchar(100),
    pfp varchar(100),
    time timestamp);

INSERT INTO users (fname, lname, username, pass, pfp, time) VALUES ('Gabriel', 'Falk', 'gabreil', 'gabbe123', 'gabprofilepic.png', NOW());


CREATE TABLE threads (
    username varchar(60),
    title TINYTEXT,
    descr varchar(250),
    uploadedFile varchar(100),
    uploadTime timestamp);

INSERT INTO threads (title, description, contactInfo, uploadedFile, uploadTime) VALUES ('test title', 'test description', 'test contact info', 'test_file.jpg', NOW());


CREATE TABLE comments (
    username varchar(60),
    userComment varchar(250),
    threadTitle TINYTEXT);

INSERT INTO comments (username, userComment, threadTitle) VALUES ('test username', 'this is a userComment test', 'TEST threadTitle TEST');

*/

?>

</body>
</html>