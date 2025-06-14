<?php
include 'db.php';
$category = $_GET['category'];
$sql = "SELECT * FROM articles WHERE category='$category'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $category ?> News</title>
</head>
<body>
    <h1><?= $category ?> News</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div>
            <h3><?= $row['title'] ?></h3>
            <img src="<?= $row['image'] ?>" width="200">
            <p><?= substr($row['description'], 0, 100) ?>...</p>
            <a href="article.php?id=<?= $row['id'] ?>">Read More</a>
        </div>
    <?php endwhile; ?>
</body>
</html>
