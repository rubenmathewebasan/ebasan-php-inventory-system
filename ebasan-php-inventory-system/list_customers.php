<?php
include 'database.php';
$rows = $conn->query("SELECT * FROM customers");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Customers - Ebasan Computer Parts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <h1 class="page-title">Customers</h1>

    <div class="top-bar">
        <a class="button add-btn" href="add_customer.php">Add Customer</a>
    </div>

    <div class="table-container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($r = $rows->fetch_assoc()): ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td><?= $r['name'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><?= $r['phone'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>