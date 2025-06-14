<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        a { display: block; margin: 20px; text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <h2>Welcome to Admin Dashboard</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
