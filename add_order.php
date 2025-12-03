<?php
include '../database.php';
$customers = $conn->query("SELECT * FROM customers");
$products = $conn->query("SELECT * FROM products");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $customer = $_POST['customer'];
    $conn->query("INSERT INTO orders (customer_id) VALUES ('$customer')");
    $order_id = $conn->insert_id;

    foreach($_POST['products'] as $pid=>$qty){
        if($qty>0){
            $p = $conn->query("SELECT price FROM products WHERE id=$pid")->fetch_assoc();
            $conn->query("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id,$pid,$qty,{$p['price']})");
        }
    }
    header("Location: list.php");
}
?>
<form method="post">
    Customer:
    <select name="customer">
        <?php while($c=$customers->fetch_assoc()): ?>
            <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
        <?php endwhile; ?>
    </select><br>
    Products:<br>
    <?php while($p=$products->fetch_assoc()): ?>
        <?= $p['name'] ?> ($<?= $p['price'] ?>): 
        <input type="number" name="products[<?= $p['id'] ?>]" value="0"><br>
    <?php endwhile; ?>
    <button type="submit">Create Order</button>
</form>
