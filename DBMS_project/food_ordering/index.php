<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to the Food Ordering System</h1>
        <form action="order.php" method="POST">
            <label for="food">Choose your food:</label>
            <select name="food" id="food">
                <option value="Burger">Burger</option>
                <option value="Pizza">Pizza</option>
                <option value="Pasta">Pasta</option>
                <option value="Salad">Salad</option>
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required>

            <input type="submit" value="Place Order">
        </form>
    </div>
</body>

</html>