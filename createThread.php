<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.html</title>
</head>
<body>
    
    

<?php
session_start();
echo '<form action="threadConfirmation.php" method="post">
<input type="text" name="title" placeholder="Title"> <br>
<input type="text" name="description" placeholder="Description"> <br>
<input type="tel" name="contactInfo" placeholder="Contact info"> <br>
<input type="text" name="uploadedFile" placeholder="(Lägg till ladda upp fil)"> <br>
<input type="submit" value="Submit">
</form>';

/* 
WEBBSERV SQL PHP FORUM TABLE COMMANDS

CREATE TABLE users (
    fname varchar(50),
    lname varchar(50),
    username varchar(60),
    pass varchar(50),
    pfp varchar(100),
    time timestamp);

INSERT INTO users (fname, lname, username, pass, pfp, time) VALUES ('Gabriel', 'Falk', 'gabreil', 'gabbe123', 'gabprofilepic.png', NOW());


CREATE TABLE threads (
    title TINYTEXT,
    description TEXT(255),
    contactInfo varchar(50),
    uploadedFile varchar(100),
    uploadTime timestamp);

INSERT INTO threads (title, description, contactInfo, uploadedFile, uploadTime) VALUES ('test title', 'test description', 'test contact info', 'test_file.jpg', NOW());
*/

?>

</body>
</html>