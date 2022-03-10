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
if ($result->num_rows > 1) {
    while($row = $result->fetch_assoc()) {
        $username = array($row["username"]);
        $title = array($row["title"], $row["username"]);
        /*$username = array($row["username"]);*/
        $uploadTime = array($row["uploadTime"]);
       /* array_push($row["title"], $row["username"], $row["uploadTime"]); */
        foreach($title as $x => $x_value){
            $text = str_replace("***title***",$x_value,$text);
            $text = str_replace("***username***",$x_value,$text);
            echo $text;
            echo $text_array[1];
        }
     /*   foreach($username as $y => $y_value){
            $text = str_replace("***username***",$y_value,$text_array[1]);
            echo $text;
        }*/
    }
} else {
    echo "If sats inte funka";
}
    
echo $text_array[2];




?>