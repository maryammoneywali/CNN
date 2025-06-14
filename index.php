<?php
include 'db.php';

$sql = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My News</title>
    <style>
        /* Basic Page Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header */
        h1 {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 20px;
            margin: 0;
        }

        /* Navigation Bar */
        nav {
            text-align: center;
            background-color: #444;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin: 5px;
            display: inline-block;
        }
        nav a:hover {
            background-color: #666;
            border-radius: 5px;
        }

        /* Headlines Section */
        h2 {
            text-align: center;
            margin-top: 20px;
        }

        /* Article Box */
        .article {
            background: white;
            width: 80%;
            margin: 20px auto;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .article h3 {
            color: #333;
        }
        .article img {
            width: 100%;
            max-width: 300px;
            border-radius: 5px;
            display: block;
            margin: 10px 0;
        }
        .article p {
            color: #666;
        }
        .article a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .article a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>My News</h1>

    <nav>
        <a href="index.php">Home</a>
        <a href="category.php?category=Politics">Politics</a>
        <a href="category.php?category=Sports">Sports</a>
        <a href="category.php?category=Tech">Tech</a>
    </nav>

    <h2>Top Headlines</h2>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="article">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <img src="<?= htmlspecialchars($row['image']) ?>" alt="News Image">
            <p><?= htmlspecialchars(substr($row['description'], 0, 100)) ?>...</p>
            <a href="article.php?id=<?= $row['id'] ?>">Read More</a>
        </div>
    <?php endwhile; ?>

</body>
</html>
