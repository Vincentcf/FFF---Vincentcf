<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open thread</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<!-- Go back to previous page button -->
<a class="btn btn-primary" href="prevthreads.php" role="button"><- Go back</a>

<br><br><br>

<!-- Javascript, toggle display/hide form 'Post comment' -->
<script type="text/javascript">
    function displayComment() {
  var x = document.getElementById("formElement");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
} 
</script>

<?php
session_start();
	$servername = "localhost";
    $username = "root";
    $password = "";
    $DBname = "forum";
    $conn = new mysqli($servername, $username, $password, $DBname);
	
// Connects 'openthread.php' to 'openthread.html' with file_get_contents
	$html = file_get_contents("openthread.html");
	$text_array = explode("***PHP***", $html);
	echo $text_array[0];

	$title = $_POST["title"];
	$username = $_POST["username"];
	$descr = $_POST["descr"];
	$uploadedFile = $_POST["uploadedFile"];

	
		   $x = 1;
		   if ($x == 1){
			$sql = "SELECT * FROM comments WHERE threadTitle = '" . $title . "';";
			$text = str_replace("***title***",$_POST["title"],$text_array[1]);
			$text = str_replace("***username***",$_POST["username"],$text);
			$text = str_replace("***descr***",$_POST["descr"],$text);
			$text = str_replace("***uploadedFile***",$_POST["uploadedFile"],$text);
			
			$btn = '<button class="btn btn-outline-info" type="button" onClick="displayComment()">' . 'Add comment' . '</button>';
			$text = str_replace("***commentButton***",$btn,$text);
			echo $text;
			
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "Nonzero number of rows...";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$comment = array($row["username"], $row["userComment"]);
						$text = str_replace("***username***",$row["username"],$text_array[2]);
						$text = str_replace("***userComment***",$row["userComment"],$text);
						echo $text;
				}

				return;
			}
			else {
				echo "Ännu inga kommentarer i denna tråd!";
			}
		   } 
		   else {
			   echo "<p1 style='color:blue;'>'x' is not 1.</p";
		   }

	


?>




</body>
</html>