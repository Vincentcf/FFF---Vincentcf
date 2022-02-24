<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    echo '<h1>Welcome</h1>';

    echo 'You are logged in as: ' . '<b>' . $_SESSION['loginname'] . "<br>" .  "Username: " . $_SESSION["username"] . '<b><br><br>';

    ?>

<!-- <script type="text/javascript">
    function showForm() {
        document.getElementById('formElement').style.display = 'block';
        }
</script>
    -->

<script type="text/javascript">
    function myFunction() {
  var x = document.getElementById("formElement");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
} 
</script>

<button type="button" onclick=myFunction() class="btn btn-outline-info btn-rounded" data-mdb-ripple-color="dark">Create new thread/post</button>

<div id="formElement" class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form class="contact2-form validate-form" action="createThread.php" method="post" name="formClass" onsubmit="return validateForm()">
					<span class="contact2-form-title">
						Create a Post
					</span>

					<div class="wrap-input2 validate-input" data-validate="Title is required">
						<input class="input2" type="text" name="title" id="titleId">
						<span class="focus-input2" data-placeholder="TITLE"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Valid email is required, i.e. abc@123.com">
						<input class="input2" type="email" name="contactInfo" id="contactId">
						<span class="focus-input2" data-placeholder="EMAIL"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Description is required">
						<textarea class="input2" name="descr" id="descrId"></textarea>
						<span class="focus-input2" data-placeholder="DESCRIPTION"></span>
					</div>

					<div class="wrap-input2">
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="uploadedFile" placeholder="File">
					</div>

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								Create Post
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

  <!-- Start på tidigare skapade trådar -->  
<table class="threads">
    <tbody>
        <tr class="threadRow">
            <th></th>
            <th> Nr </th>
            <th> Rubrik </th>
            <th> Skapad av </th>
            <th> Senaste inlägg </th>
        </tr>
        <tr class="threadRow">
            <td>
                <form action="readthread.php" method="post">
                    <input type="hidden" name="email" value="manfol">
                    <input type="hidden" name="userpass" value="bar">
                    <input type="hidden" name="presentation" value="Jag heter Magnus">
                    <input type="hidden" name="header" value="Första tråden">
                    <input type="hidden" name="topicid" value="0">
                    <input type="hidden" name="updates" value="1">
                    <input type="hidden" name="originator" value="holros">
                    <input class="result" type="submit" name="submit" value="Open thread">  <!-- $html = file_get_contentblablabla -->
                </form> 
            </td>
            <td> Nr </td>
            <td> Rubrik </td>
            <td> Skapad av </td>
            <td> Senaste inlägg </td>
        </tr>
        <br><br>
        <a name="" id="" class="btn btn-primary" href="previousthreads.php" role="button">Previous threads</a>

    </tbody>
</table>


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
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>