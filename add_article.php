<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Image Upload Handling
    $targetDir = "uploads/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Allow only specific file types
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $allowedTypes)) {
        // Move uploaded file to uploads folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Save data to database
            $sql = "INSERT INTO articles (title, description, image) VALUES ('$title', '$description', '$imageName')";
            if ($conn->query($sql)) {
                echo "Article added successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "File upload failed!";
        }
    } else {
        echo "Invalid file type!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
</head>
<body>

<h2>Add New Article</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <label>Title:</label>
    <input type="text" name="title" required><br><br>

    <label>Description:</label>
    <textarea name="description" required></textarea><br><br>

    <label>Upload Image:</label>
    <input type="file" name="image" accept="image/*" required><br><br>

    <input type="submit" value="Add Article">
</form>

</body>
</html>
