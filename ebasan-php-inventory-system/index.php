<?php
include 'database.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ebasan Computer Parts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <h1>Ebasan Computer Parts</h1>

    <nav>
        <a href="index.php">Products</a>
        <a href="list_category.php">Categories</a>
        <a href="list_customers.php">Customers</a>
        <a href="list_orders.php">Orders</a>
    </nav>

    <h2>Products List</h2>
    <a class="button" href="add_product.php">Add Product</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>

        <?php
        $sql = "SELECT p.id, p.name, p.price, p.stock, c.name AS category 
                FROM products p 
                JOIN categories c ON p.category_id = c.id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td>$<?= number_format($row['price'], 2) ?></td>
                    <td><?= $row['category'] ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td>
                        <a class="button" href="edit_product.php?id=<?= $row['id'] ?>">Edit</a>
                        <a class="button" style="background:#e74c3c"
                            href="delete_product.php?id=<?= $row['id'] ?>"
                            onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php
            endwhile;
        else:
            ?>
            <tr>
                <td colspan="6">No products found.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>

</html>