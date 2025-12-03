<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $conn->query("INSERT INTO categories (name) VALUES ('$name')");
    header("Location: list_category.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category - Ebasan Computer Parts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1 class="page-title">Add New Category</h1>

<form method="post" class="form-container">
    <label for="name">Category Name</label>
    <input type="text" id="name" name="name" placeholder="Enter category name" required>

    <div class="form-buttons">
        <a class="button back-button" href="list_category.php">Back</a>
        <button type="submit" class="button submit-button">Add Category</button>
    </div>
</form>

</body>
</html>
