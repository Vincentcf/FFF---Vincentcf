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

	<!-- NAVBAR BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- NAVBAR BOOTSTRAP -->
</head>
<body>
<h5> Open thread page. Page for reading a specifically chosen thread from "prevthreads.php"</h5> <br>

<a class="btn btn-primary" href="prevthreads.php" role="button"><- Go back</a>

<br><br><br> 




<?php
session_start();
$servername = "localhost";
    $username = "root";
    $password = "";
    $DBname = "forum";
    $conn = new mysqli($servername, $username, $password, $DBname);
	

	$title = $_POST["title"];
	$username = $_POST["username"];
	$sql = "SELECT * FROM threads";

	echo "Poster: " . $_POST["username"] . "<br><br> Title: ". $_POST["title"];

echo '<!-- navbarmeny sektion start-->
<section>
  <h2 class="section_hidden_header">.</h2>
<div class="container-fluid p-0 mh-100"> 
  <nav class="navbar my-custom-navbar-1 navbar-expand-lg navbar-dark">
	  <a href="index.html" class="navbar-brand ">CompanyName</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggle" aria-controls="toggle" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="toggle"> 
		   
	  <ul class="navbar-nav ml-auto">
		 
		  <li class="nav-item nav_login_item d-flex"> 
			  <a class="nav_login_link" href="signup.html"><i class="fas fa-user"></i> Sign Up</a>
		  </li>
		  <li class="nav-item">
			 <a href="contact.html" class="btn btn-outline-info mr-2 nav_contact_btn ">Contact <i class="far fa-envelope"></i> </a>
		  </li>
		</ul>
		  <form class="d-flex nav_search_bar">
			  <input class="form-control me-2 mr-1" type="search" placeholder="Search" aria-label="Search">
			  <button class="fas fa-search btn btn-outline-secondary" type="submit"></button>
			</form>

	  
	  </div>
  </nav>
</div> 

	  
  
  
	<!-- De större navigeringsknapparna i undre delen-->
  <div class="container-fluid container_bottom_nav d-flex justify-content-center"> 
		  <div class="btn-group custom-btn-group" role="group" aria-label="Button group with nested dropdown">
			<a href="builder.html" class="col-lg-4 btn btn_navbar_1 "><i class="fas fa-tools"></i>System Builder</a> 
			<a href="#" class="col-lg-4 btn btn_navbar_1"><i class="fas fa-check-square"></i>Finished Builds</a>
			<a href="#other_products_hyperlink_position" class="col-lg-4 btn btn_navbar_1 ">Other Products <i class="fas fa-arrow-down"></i></a>
			</div>
  </div>
  </section>
  <!--navbarmeny sektion stopp-->'


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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        

</body>
</html>