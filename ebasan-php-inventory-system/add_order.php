<?php
include 'database.php';
$customers = $conn->query("SELECT * FROM customers");
$products = $conn->query("SELECT * FROM products");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer = $_POST['customer'];
    $conn->query("INSERT INTO orders (customer_id) VALUES ('$customer')");
    $order_id = $conn->insert_id;

    foreach ($_POST['products'] as $pid => $qty) {
        if ($qty > 0) {
            $p = $conn->query("SELECT price FROM products WHERE id=$pid")->fetch_assoc();
            $conn->query("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id,$pid,$qty,{$p['price']})");
        }
    }
    header("Location: list_orders.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Order - Ebasan Computer Parts</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1 class="page-title">Create New Order</h1>

    <div class="table-container" style="max-width:700px; margin:auto;">
        <form method="post" class="styled-form">
            <label for="customer">Select Customer</label>
            <select id="customer" name="customer" required>
                <?php while ($c = $customers->fetch_assoc()): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                <?php endwhile; ?>
            </select>

            <h3>Products</h3>
            <?php while ($p = $products->fetch_assoc()): ?>
                <div class="product-row">
                    <span><?= $p['name'] ?> ($<?= $p['price'] ?>)</span>
                    <input type="number" name="products[<?= $p['id'] ?>]" value="0" min="0">
                </div>
            <?php endwhile; ?>

            <div style="display:flex; justify-content:space-between; margin-top:20px;">
                <a class="button" style="background:#e74c3c;" href="list.php">BACK</a>
                <button type="submit" class="button add-btn">Create Order</button>
            </div>
        </form>
    </div>

</body>

</html>