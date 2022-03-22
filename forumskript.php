<!DOCTYPE html>
<html lang="en">
  <head>
    <!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

<?php
session_start();

// Inloggning  ----------------------------------------------------------------------------------------------------------------

if ($_SESSION["Value"] == "login") {

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
    $_SESSION["username"] = $row["username"];

    } 

  }

}

if ($login_success == "true") {

  header("Location: index.php", TRUE);
  

} else {

  header("Location: main.php", TRUE);

  $_SESSION["password"] = "wrong";

  $_SESSION["Failed"] = "true";

}


} else if ($_SESSION["Value"] == "signup") { //SIGN UP -----------------------------------------------------------------------


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

  header("Location: main.php", TRUE);
  $_SESSION["Failed"] = "falsecheck";
  $_SESSION['signupcheck'] = "falsecheck";

  // Check it's not too big
} else if ($_FILES["fileToUpload"]["size"] > 500000){

  header("Location: main.php", TRUE);
  $_SESSION["Failed"] = "size";
  $_SESSION['signupcheck'] = "falsecheck";

  // Only allow JPG, JPEG, PNG & GIF
} else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

  header("Location: main.php", TRUE);
  $_SESSION["Failed"] = "format";
  $_SESSION['signupcheck'] = "falsecheck";

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
