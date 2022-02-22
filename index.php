<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

    echo "<button onclick=showForm() >" . "Create new thread/post" . "</button>" . "<br><br>";

    /*
    echo "<table class=threads>";
    echo "<tbody>"; 
    echo "<tr class=threadRow>" . "<th>  </th>" . "<th>Nr</th>" . "<th>Rubrik</th>" . "<th>Skapad av</th>" . "<th>Senaste inlägg</th>" . "</tr>";
    echo "<tr class=threadRow>" . "<th>  </th>" . "<th>Nr</th>" . "<th>Rubrik</th>" . "<th>Skapad av</th>" . "<th>Senaste inlägg</th>" . "</tr>";
    echo "<tr class=threadRow>" . "<th>  </th>" . "<th>Nr</th>" . "<th>Rubrik</th>" . "<th>Skapad av</th>" . "<th>Senaste inlägg</th>" . "</tr>";
    echo "<tr class=threadRow>" . "<th>  </th>" . "<th>Nr</th>" . "<th>Rubrik</th>" . "<th>Skapad av</th>" . "<th>Senaste inlägg</th>" . "</tr>";
    echo "</tbody>";
    echo "</table>";
    */

    ?>

<script type="text/javascript">
    function showForm() {
        document.getElementById('formElement').style.display = 'block';
        }
</script>


    <form id="formElement" action="createThread.php" method="post">
        <input type="text" name="title" placeholder="Title"> <br>
        <input type="text" name="descr" placeholder="Description"> <br>
        <input type="tel" name="contactInfo" placeholder="Contact info"> <br>
        <input type="file" name="uploadedFile" placeholder="File"> <br>
    <!-- <a href='uploadFile.php'>Upload a file</a> <br> -->
        <input type="submit" value="Submit">
        <br><br>
    </form>



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
                    <input class="result" type="submit" name="submit" value="Open thread">
                </form> 
            </td>
            <td> Nr </td>
            <td> Rubrik </td>
            <td> Skapad av </td>
            <td> Senaste inlägg </td>
        </tr>
        
    </tbody>
</table>


</body>
</html>