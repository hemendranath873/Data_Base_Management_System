<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $food = $_POST['food'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO orders (food, quantity, status) VALUES ('$food', '$quantity', 'Pending')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Your order has been placed successfully! You will be served shortly.</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<a href="index.php">Back to Home</a>