<?php
$servername = "localhost";
$username = "uinfqfwdtcxs6";
$password = "ntc896wdxy2w";
$dbname = "db0rpggfehgcay";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// No echo or debug output here!
?>
