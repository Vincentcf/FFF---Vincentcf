<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "forum";
$conn = new mysqli($servername, $username, $password, $DBname);

// Connects 'prevthreads.php' to 'prevthreads.html' with 'file_get_contents'
$html = file_get_contents("prevthreads.html");
$text_array = explode("***PHP***", $html);
echo $text_array[0];

// Gets values from database in table 'threads'
$sql = "SELECT * FROM threads";
$result = $conn->query($sql);
$count = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Puts values in an array
    $title = array($row["title"], $row["username"], $row["uploadTime"], $row["descr"], $row["uploadedFile"]);
    foreach($title as $x){
        $count = $count + 1;
        // Replace string on prevthreads.html with values from databse
        $text = str_replace("***title***",$row["title"],$text_array[1]);
        $text = str_replace("***number***",$count,$text);
        $text = str_replace("***username***",$row["username"],$text);
        $text = str_replace("***uploadTime***",$row["uploadTime"],$text);
        $text = str_replace("***uploadedFile***",$row["uploadedFile"],$text);
        $text = str_replace("***descr***",$row["descr"],$text);
        echo $text;
        break;
        }
    }
} 

// Echo 3rd part/array of the webpage
echo $text_array[2];


?>