<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "forum";
$conn = new mysqli($servername, $username, $password, $DBname);


$html = file_get_contents("prevthreads.html");
$text_array = explode("***PHP***", $html);
echo $text_array[0];

$sql = "SELECT * FROM threads";
$result = $conn->query($sql);
$count = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $title = array($row["title"], $row["username"], $row["uploadTime"], $row["descr"], $row["uploadedFile"]);
      /*  $title = array($row["title"]);
        $username = array($row["username"]); */
        /*$username = array($row["username"]);*/
       /* $uploadTime = array($row["uploadTime"]);*/
       /* array_push($row["title"], $row["username"], $row["uploadTime"]); */
       foreach($title as $x){
           $count = $count + 1;
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
} else {
    echo "if-sats funkar ej på rad 17";
}
    
echo $text_array[2];




?>