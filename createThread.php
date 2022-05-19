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

    <!-- Go back to previous page button -->
<a class="btn btn-primary" href="index.php" role="button">Go back</a>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum";
$conn = new mysqli($servername, $username, $password, $dbname);

echo 'You are logged in as: ' . '<b>' . $_SESSION['loginname'] . "<br>" .  "Username: " . $_SESSION["username"] . '</b><br><br>';

$username = $_SESSION["username"];
$title = $_POST["title"];
$descr = $_POST["descr"];
$uploadedFile = $_POST["uploadedFile"];
$sql = "INSERT INTO threads (username, title, descr, uploadedFile) 
        VALUES ('$username', '$title', '$descr', '$uploadedFile')";
$conn->query($sql);


// Printar ut den skapade trådens innehåll.
if ($conn->connect_error) {
    die("Thread not posted. Connection failed: " . $conn->connect_error);
  }
  else {
      echo "<p class=connec_yes>Thread posted successfully</p><br>";
      $sql = "SELECT * FROM threads";
      $result = $conn->query($sql);
      echo "<p class=postedThread>Your posted thread:</p>" . "Title: " . $_POST["title"] . "<br>" . "Description: " . $_POST["descr"] . "<br>" . "Filename: " . $_POST["uploadedFile"] . "<br><br>";
  }
?>

</body>
</html>