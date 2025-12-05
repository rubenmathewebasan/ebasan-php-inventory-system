<?php
include 'database.php';
$sql = "SELECT o.id, c.name AS customer, o.order_date, COUNT(oi.id) AS items
        FROM orders o
        JOIN customers c ON o.customer_id=c.id
        LEFT JOIN order_items oi ON o.id=oi.order_id
        GROUP BY o.id";
$res = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Orders - Ebasan Computer Parts</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1 class="page-title">Orders</h1>

    <div class="top-bar">
        <a class="button add-btn" href="add_order.php">Add Order</a>
    </div>

    <div class="table-container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($r = $res->fetch_assoc()): ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td><?= $r['customer'] ?></td>
                        <td><?= $r['order_date'] ?></td>
                        <td><?= $r['items'] ?></td>
                        <td>
                            <a class="button view-btn" href="view_order_details.php?id=<?= $r['id'] ?>">View</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>