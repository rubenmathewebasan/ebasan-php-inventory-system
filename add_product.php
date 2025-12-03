<?php
include 'database.php';
$categories = $conn->query("SELECT * FROM categories");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat = $_POST['category'];
    $conn->query("INSERT INTO products (name, price, category_id) VALUES ('$name','$price','$cat')");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product - Ebasan Computer Parts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>Add New Product</h1>

<form method="post">
    <label for="name">Product Name</label>
    <input type="text" id="name" name="name" placeholder="Enter product name" required>

    <label for="price">Price</label>
    <input type="number" id="price" name="price" placeholder="Enter price" step="0.01" required>

    <label for="category">Category</label>
    <select id="category" name="category" required>
        <?php while($c = $categories->fetch_assoc()): ?>
            <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
        <?php endwhile; ?>
    </select>

    <div style="display:flex; justify-content:space-between; align-items:center; margin-top:20px;">
        <a class="button" style="background:#e74c3c;" href="index.php">BACK</a>
        <button type="submit">Add Product</button>
    </div>
</form>

</body>
</html>
