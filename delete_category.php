<?php
include 'database.php';
$id = $_GET['id'];
$conn->query("DELETE FROM categories WHERE id=$id");
header("Location: list_category.php");
?>
