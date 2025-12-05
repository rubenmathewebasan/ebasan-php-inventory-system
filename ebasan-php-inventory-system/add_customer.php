<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $conn->query("INSERT INTO customers (name,email,phone) VALUES ('$name','$email','$phone')");
    header("Location: list_customers.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Customer - Ebasan Computer Parts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .page-title {
            text-align: center;
            margin: 30px 0;
            font-size: 28px;
            color: #333;
        }

        .top-bar {
            width: 90%;
            margin: 0 auto 20px auto;
            display: flex;
            justify-content: flex-start;
        }

        .button {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            color: #fff;
            background-color: #007BFF;
            font-size: 14px;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .table-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            margin-top: 20px;
            padding: 12px;
            background: #28a745;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background: #218838;
        }
    </style>
</head>

<body>

    <h1 class="page-title">Add New Customer</h1>

    <div class="top-bar">
        <a class="button" href="list_customers.php" style="background:#e74c3c;">Back to Customers</a>
    </div>

    <div class="table-container">
        <form method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter customer name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter email address" required>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" placeholder="Enter phone number">

            <button type="submit">Add Customer</button>
        </form>
    </div>

</body>

</html>