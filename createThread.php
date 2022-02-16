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
<input type="email" name="subject" placeholder="Subject"> <br>
<input type="text" name="desc" placeholder="Description"> <br>
<input type="tel" name="contactInfo" placeholder="Contact info"> <br>
<input type="text" name="file" placeholder="(Lägg till ladda upp fil)"> <br>
<input type="submit" value="Submit">
</form>';

/* 
CREATE TABLE threads (
    PersonID int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)
);

INSERT INTO threads (title, subject, desc, contactInfo, uploadedFile, uploadtime) 
VALUES ('Test thread', 'Test subject', 'Test desc', 'Test contact info', 'test_file.jpg', NOW()); */

?>

</body>
</html>