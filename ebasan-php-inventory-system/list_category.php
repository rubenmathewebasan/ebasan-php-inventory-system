<?php
include 'database.php';
$rows = $conn->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Categories - Ebasan Computer Parts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1 class="page-title">Categories</h1>

<div class="top-bar">
    <a class="button add-btn" href="add_category.php">Add New Category</a>
</div>

<div class="table-container">
<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($r = $rows->fetch_assoc()): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= $r['name'] ?></td>
            <td>
                <a class="button edit-btn" href="category_edit.php?id=<?= $r['id'] ?>">Edit</a>
                <a class="button delete-btn" href="delete_category.php?id=<?= $r['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>

</body>
</html>
