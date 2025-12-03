<?php
include 'database.php';
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
$categories = $conn->query("SELECT * FROM categories");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat = $_POST['category'];
    $conn->query("UPDATE products SET name='$name', price='$price', category_id='$cat' WHERE id=$id");
    header("Location: index.php");
}
?>
<form method="post">
    Name: <input type="text" name="name" value="<?= $product['name'] ?>" required><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>
    Category:
    <select name="category">
        <?php while($c = $categories->fetch_assoc()): ?>
            <option value="<?= $c['id'] ?>" <?= $c['id']==$product['category_id']?'selected':'' ?>><?= $c['name'] ?></option>
        <?php endwhile; ?>
    </select><br>
    <button type="submit">Update Product</button>
</form>
