<!DOCTYPE html>
<html lang="en">
<body>

<?php
session_start();

// Inloggning  ----------------------------------------------------------------------------------------------------------------

if ($_SESSION["Value"] == "Login") {

$servername = "localhost";
$username = "root";
$password = "";
$DBname = "forum";
$conn = new mysqli($servername, $username, $password, $DBname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$login_success == "";
$_SESSION["Failed"] = "";


if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

  if($row["username"] == $_POST["username"] && $row["pass"] == $_POST["password"]) {

    $login_success = "true";

    $_SESSION['loginname'] = $row["fname"] . " " . $row["lname"];

    } 

  }

}

if ($login_success == "true") {

  header("Location: index.php", TRUE);
  

} else {

  header("Location: login.php", TRUE);
  $_SESSION["Failed"] = "true";

}


} else if ($_SESSION["Value"] == "Signup") { //SIGN UP -----------------------------------------------------------------------


$_SESSION["Failed"] = "";
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "forum";
$conn = new mysqli($servername, $username, $password, $DBname); 


$fname = $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST["username"];
$password = $_POST["password"];


$target_dir = "pfp/"; // Sets folder as directory for profile pictures
$uploaded_file =  basename($_FILES["fileToUpload"]["name"]); // Name of file
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); 
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Does a few checks to make sure image is suitable
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

// Checks it's real image
if($check == false) {

  header("Location: signup.php", TRUE);
  $_SESSION["Failed"] = "falsecheck";

  // Check it's not too big
} else if ($_FILES["fileToUpload"]["size"] > 500000){

  header("Location: signup.php", TRUE);
  $_SESSION["Failed"] = "size";

  // Only allow JPG, JPEG, PNG & GIF
} else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

  header("Location: signup.php", TRUE);
  $_SESSION["Failed"] = "format";

} else {

  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file); // Moves picture into folder
  
  /* Changes name of picture to make each picture distinct */
  $old_name = $target_dir . $uploaded_file; 
  $new_name = $target_dir . $username . $uploaded_file; 
  rename( $old_name, $new_name);

  /* Inserts values into database */
  $sql = "INSERT INTO users (fname, lname, username, pass, pfp, time) VALUES ('$fname', '$lname', '$username', '$password', '$new_name', NOW())"; 
  $result = $conn->query($sql); 
  $_SESSION['loginname'] = $fname . " " . $lname;
  header("Location: index.php", TRUE);

}


} else {

  return;

}
