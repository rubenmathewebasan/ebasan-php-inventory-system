<?php
include 'database.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
$categories = $conn->query("SELECT * FROM categories");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $cat = $_POST['category'];

    $conn->query("UPDATE products SET name='$name', price='$price', stock='$stock', category_id='$cat' WHERE id=$id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Product - Ebasan Computer Parts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <h1>Edit Product</h1>

    <form method="post">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" placeholder="Enter product name" value="<?= htmlspecialchars($product['name']) ?>" required>

        <label for="price">Price</label>
        <input type="number" id="price" name="price" placeholder="Enter price" step="0.01" value="<?= $product['price'] ?>" required>

        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" placeholder="Enter Stock" value="<?= $product['stock'] ?>" required>

        <label for="category">Category</label>
        <select id="category" name="category" required>
            <?php while ($c = $categories->fetch_assoc()): ?>
                <option value="<?= $c['id'] ?>" <?= $c['id'] == $product['category_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['name']) ?>
                </option>
            <?php endwhile; ?>
        </select>

        <div style="display:flex; justify-content:space-between; align-items:center; margin-top:20px;">
            <a class="button" style="background:#e74c3c;" href="index.php">BACK</a>
            <button type="submit">Update Product</button>
        </div>
    </form>

</body>

</html>