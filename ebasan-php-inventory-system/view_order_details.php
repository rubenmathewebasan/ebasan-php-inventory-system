<?php
include 'database.php';
$id = $_GET['id'];
$sql = "SELECT p.name, oi.quantity, oi.price
        FROM order_items oi
        JOIN products p ON oi.product_id=p.id
        WHERE oi.order_id=$id";
$res = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Details - Ebasan Computer Parts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="page-title">Order Details</h1>

<div class="table-container">
<table class="styled-table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php while($r = $res->fetch_assoc()): ?>
        <tr>
            <td><?= $r['name'] ?></td>
            <td><?= $r['quantity'] ?></td>
            <td><?= $r['price'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>

</body>
</html>
