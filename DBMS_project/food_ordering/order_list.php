<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit();
}

// Fetch orders with user and food names
$query = "SELECT order_queue.id, users.username, food_menu.name AS food_name, 
                 order_queue.quantity, order_queue.status 
          FROM order_queue
          JOIN users ON order_queue.user_id = users.id
          JOIN food_menu ON order_queue.food_id = food_menu.id";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Order List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2>Order List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Food</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['food_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <a href="index.php">Back to Home</a>
</body>

</html>