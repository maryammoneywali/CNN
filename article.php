<?php
include 'db.php';

// Article fetch karna
$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h1 {
            color: #333;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px auto;
            border-radius: 10px;
        }
        p {
            line-height: 1.6;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?= htmlspecialchars($article['title']) ?></h1>
    <img src="uploads/<?= htmlspecialchars($article['image']) ?>" 
         onerror="this.src='uploads/default.jpg';" 
         alt="Image">
    <p><?= nl2br(htmlspecialchars($article['description'])) ?></p>
</div>

</body>
</html>
