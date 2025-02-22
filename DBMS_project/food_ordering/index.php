<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order'])) {
    $user_id = $_SESSION['user_id'];
    $food_id = $_POST['food_id'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO order_queue (user_id, food_id, quantity, status) VALUES (?, ?, ?, 'pending')";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $user_id, $food_id, $quantity);
    $stmt->execute();

    echo "Order placed successfully!";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Food Ordering System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2>Welcome to Food Ordering System</h2>
    <a href="logout.php">Logout</a>

    <h2>Menu</h2>
    <form method="POST">
        <label for="food">Choose Food:</label>
        <select name="food_id">
            <?php
            $menuQuery = "SELECT * FROM food_menu";
            $result = $conn->query($menuQuery);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']} - \${$row['price']}</option>";
            }
            ?>
        </select>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>
        <button type="submit" name="order">Order Now</button>
    </form>
</body>

</html>