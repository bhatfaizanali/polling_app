<?php

function connect_mysql() {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phppoll";
// Creating connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Checking connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
    return $conn;
}
}



function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>$title</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
    <nav class="navtop">
        <div>
            <a href='index.php'><h1>Polling App</h1></a>
        </div>
    </nav>
EOT;
}

function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}