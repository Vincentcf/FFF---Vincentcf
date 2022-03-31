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
<h5> Open thread page. Page for reading a specifically chosen thread from "prevthreads.php"</h5> <br>

<a class="btn btn-primary" href="prevthreads.php" role="button"><- Go back</a>

<br><br><br> 

<div class="container">
	<div class="row">
		<h1>thread title</h1>
		<div class="col">
		<p> username of poster</p>
		</div>
		<div class="col">

		</div>
		<div class="col">
			
		</div>
	</div>
</div>


<?php
session_start();
$servername = "localhost";
    $username = "root";
    $password = "";
    $DBname = "forum";
    $conn = new mysqli($servername, $username, $password, $DBname);
	
	$html = file_get_contents("openthread.html");
	$text_array = explode("***PHP***", $html);
	echo $text_array[0];

	$title = $_POST["title"];
	$username = $_POST["username"];
	$descr = $_POST["descr"];
	$uploadedFile = $_POST["uploadedFile"];
	$sql = "SELECT * FROM threads";

	
		  /*  $title = array($row["title"]);
			$username = array($row["username"]); */
			/*$username = array($row["username"]);*/
		   /* $uploadTime = array($row["uploadTime"]);*/
		   /* array_push($row["title"], $row["username"], $row["uploadTime"]); */

		   $text = str_replace("***title***",$_POST["title"],$text_array[1]);
		   $text = str_replace("***username***",$_POST["username"],$text);
		   $text = str_replace("***descr***",$_POST["descr"],$text);
		   $text = str_replace("***uploadedfile***",$_POST["uploadedFile"],$text);
		   echo $text;
		
	echo $text_array[2];
	

	echo "<br><br>" . "Poster: " . $_POST["username"] . "<br><br> Title: ". $_POST["title"];



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



	<!-- Global site tag (gtag.js) - Google Analytics -->
    <!--
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
-->

</body>
</html>