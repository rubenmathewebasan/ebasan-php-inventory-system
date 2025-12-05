<?php
include 'database.php';
$id = $_GET['id'];
$category = $conn->query("SELECT * FROM categories WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $conn->query("UPDATE categories SET name='$name' WHERE id=$id");
    header("Location: list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Category - Ebasan Computer Parts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="page-title">Edit Category</h1>

<form method="post" class="category-form">
    <label for="name">Category Name</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>

    <div class="form-buttons">
        <a class="button back-btn" href="list.php">Back</a>
        <button type="submit" class="button submit-btn">Update Category</button>
    </div>
</form>

</body>
</html>
