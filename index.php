<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<body>
    <?php
    session_start();
    echo 'You are logged in as: ' . '<b>' . $_SESSION['loginname'] . '<b>';
    echo '<h1>Welcome</h1>'






    ?>
    
</body>
</html>