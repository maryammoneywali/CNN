<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        die("Error: Please fill in all fields.");
    }

    // Make username case-insensitive
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE LOWER(username) = LOWER(?)");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        die("Error: User not found!");
    }

    $stmt->bind_result($admin_id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        // Store admin session and redirect to dashboard
        $_SESSION['admin_id'] = $admin_id;
        header("Location: dashboard.php");
        exit();
    } else {
        die("Error: Incorrect password!");
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        form { display: inline-block; padding: 20px; border: 1px solid #ddd; }
        input { display: block; margin: 10px auto; padding: 10px; }
        button { padding: 10px 20px; background: #333; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Admin Login</h2>
    <form action="admin.php" method="POST">
        <input type="text" name="username" placeholder="Enter admin username" required>
        <input type="password" name="password" placeholder="Enter admin password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
