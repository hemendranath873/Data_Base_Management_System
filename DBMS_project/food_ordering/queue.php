<?php
include('config.php');

$sql = "SELECT * FROM orders WHERE status = 'Pending' ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Order ID: " . $row['id'] . " | Food: " . $row['food'] . " | Quantity: " . $row['quantity'] . " | Status: " . $row['status'] . "<br>";
    }
} else {
    echo "No pending orders in the queue.";
}