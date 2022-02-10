<!DOCTYPE html>
<html lang="en">
<body>

<?php

//  cd c:
// cd xampp
// cd htdocs
// cd forum
// git add .
// git commit -m "kommentar"
// git push origin vincent




session_start();

// Inloggning  ----------------------------------------------------------------------------------------------------------------

if ($_SESSION["Value"] = "Login") {

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
    
    } 

  }

}

if ($login_success == "true") {

  header("Location: index.php", TRUE);
  

} else {

  header("Location: login.php", TRUE);
  $_SESSION["Failed"] = "true";

}












} else if ($_SESSION["Value"] = "Signup") { //SIGN UP -----------------------------------------------------------------------

$servername = "localhost";
$username = "root";
$password = "";
$DBname = "forum";
$conn = new mysqli($servername, $username, $password, $DBname); //kolla
  
  
$name = $_POST["name"];
$email = $_POST["email"];
$homepage = $_POST["homepage"];
$comment = $_POST["comment"];
$sql = "INSERT INTO Guestbook (fname, lname, username, pass, pfp, time) VALUES ('$fname', '$lname', '$username', '$password', '$pfp', now())";
$conn->query($sql);
  
if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

} else {
  return;
}
  

} else {

  return;

}




// HEJ





if (isset($_POST['username']) && isset($_POST['password'])){

$servername = "localhost";
$username = "root";
$password = "";
$DBname = "forum";
$conn = new mysqli($servername, $username, $password, $DBname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully! ";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$login_success = false;
$full_name = "";
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

		if($row["userId"] == $_POST["username"] && $row["passwd"] == $_POST["password"]) {

			$login_success = true;
			$full_name = $row["firstname"] . " " . $row["lastname"];
			
			}
		}
	}
} else {
    echo "0 results";
} 



$conn->close();

$_SESSION["username"] = $_POST["username"];

if(isset($_POST['Logout'])) {
	session_destroy(); 
	}

// Sign Up

$target_dir = "files/";
$uploaded_file = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$servername = "localhost";
$username = "root";
$password = "";
$DBname = "vincent sql projekt";
$conn = new mysqli($servername, $username, $password, $DBname);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".<br><br>";
    $uploadOk = 1;
  } else {
    echo "File is not an image." . "<br><br>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "File already exists." . "<br><br>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Your file is too large." . "<br><br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Only JPG, JPEG, PNG & GIF files are allowed." . "<br><br>";
  $uploadOk = 0;
}

$myfile = fopen("logs.txt", "a") or die("Unable to open file!");
$txt = $_SESSION["name"] . " uploaded " . $uploaded_file . " at " . date("Y/m/d") . " " . date("h:i:s") . "\n\n";

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded." . "<br><br>";
  echo '<form method="post" enctype="multipart/form-data">
  Try uploading another image:
   <input type="file" name="fileToUpload" id="fileToUpload">
   <input type="submit" value="Upload Image" name="submit"><br><br>
 </form>';
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    fwrite($myfile, $txt);
    fclose($myfile);
    if($_SESSION["username"] == "holros") {
      $sql = "INSERT INTO uploads (filename, user, uploadtime, snuskig)
      VALUES ('$uploaded_file', '" . $_SESSION["username"] . "', NOW(), TRUE)";
      $conn->query($sql);
    } else {
      $sql = "INSERT INTO uploads (filename, user, uploadtime) VALUES ('$uploaded_file', '" . $_SESSION["username"] . "', NOW())";
      $result = $conn->query($sql);
    }
    echo '<br><br><form method="post" enctype="multipart/form-data">
    Select to upload another image:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit"><br><br>
  </form>';
  } else {
    echo "Sorry, there was an error uploading your file.";
    echo '<br><br><form method="post" enctype="multipart/form-data">
   Try uploading another image:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit"><br><br>
  </form>';
  }
}



	
?>

<form action="sqllogin.html" method="post">
	<input type="submit" name="Logout" value="Logout"/>
</form>

</body>
</html>
