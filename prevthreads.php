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
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $title = array($row["title"], $row["username"], $row["uploadTime"]);
      /*  $title = array($row["title"]);
        $username = array($row["username"]); */
        /*$username = array($row["username"]);*/
       /* $uploadTime = array($row["uploadTime"]);*/
       /* array_push($row["title"], $row["username"], $row["uploadTime"]); */
        foreach($title as $x => $x_value){
            $text = str_replace("***title***",$row["title"],$text_array[1]);
            $text = str_replace("***username***",$row["username"],$text);
            $text = str_replace("***uploadTime***",$row["uploadTime"],$text);

            echo $text;
            break;
        }

    }
} else {
    echo "If sats inte funka";
}
    
echo $text_array[2];




?>