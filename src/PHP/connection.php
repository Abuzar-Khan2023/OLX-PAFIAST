<!-- This is just for connecting to the database -->
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "olx";

$conn = new mysqli($server, $username, $password, $database);

echo "Connected Successfully by Abuzar Khan";

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}