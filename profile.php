<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <title>Profile</title>
</head>
<body>
    <h1 class="text-center">Account</h1>
    <a href="index.php">
    <button type="button" style="margin-left:5%; background-color:aquamarine;"><--Go Back</button>
    </a>
    <!-- <button type="button" style="margin-left:5%; background-color:red"><b>DELETE ACCOUNT</b></button>-->
    <div class="content d-flex justify-content-center ">

    <?php
    session_start();
    $incorrectpass = false;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $DBname = "forum";
    $conn = new mysqli($servername, $username, $password, $DBname);

    $imgUrl = "pfp/". $_SESSION["username"] . ".png";
    echo "
    <div class='profilepict'>
	<img class='pfpt' src='$imgUrl'>

    <form method='post'>
        <b>Change password?</b><br>
        Old password: <input type='password' name='oldpass' id='oldpass' required>
        New password: <input type='password' name='newpass' id='newpass' required>
        Confirm Pass: &nbsp; <input type='password' name='confirmpass' id='confirmpass' required>
        <input type='submit' name='confirm' value='Confirm'>
        <input type='checkbox' onclick='myFunction()'>Show Password
    </form>";

    echo '
    <script>
        function myFunction() {
        var x = document.getElementById("oldpass");
        var y = document.getElementById("newpass");
        var z = document.getElementById("confirmpass");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
            z.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
            z.type = "password";
        }
    }
    </script>';

if (isset($_POST["oldpass"])){

    $newpass = $_POST["newpass"];
    $confirmpass = $_POST["confirmpass"];
    $oldpass = $_POST["oldpass"];
    $sha1oldpass = sha1($oldpass);
    $sha1newpass = sha1($newpass);
    $sha1confirmpass = sha1($confirmpass);  

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
    
            if($row["pass"] == $sha1oldpass && $row["username"] == $_SESSION["username"]) {

                if ($newpass == $oldpass){

                    echo "<h3 style='color:red'>New password can't be same as old one!</h3>";
                    $incorrectpass = false;
                    
                } else if ($confirmpass == $newpass) {

                    echo "<h3 style='color:green'>Password has been changed!</h3>";
                    $sql = "UPDATE users SET pass='$sha1newpass' WHERE pass='$sha1oldpass'";
                    $incorrectpass = false;
                    $conn->query($sql);
                    break;

                } else {

                    echo "<h3 style='color:red'>Confirmed password is not same!</h3>";
                    $incorrectpass = false;
                    
                }

            } else {
                
                $incorrectpass = true;

            }
        }
    }
}

    if ($incorrectpass){
        echo "<h3 style='color:red'>Incorrect password!</h3>";
    }

    echo "
    </div></div>";
    echo "<div class=text-center>
    <p><b>Name: </b></p>" . $_SESSION['username'] . "</div><br>";
    echo "<div class=text-center>
    <p><b>First Name: </b></p>" . $_SESSION['fname'] . "</div><br>";
    echo "<div class=text-center>
    <p><b>Last Name: </b></p>" . $_SESSION['lname'] . "</div><br>";


    ?>
    
    

</body>
</html>