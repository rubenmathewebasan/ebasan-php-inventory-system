<?php
include 'database.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $conn->query("INSERT INTO customers (name,email,phone) VALUES ('$name','$email','$phone')");
    header("Location: list_customers.php");
}
?>
<form method="post">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Phone: <input type="text" name="phone"><br>
    <button type="submit">Add Customer</button>
</form>
