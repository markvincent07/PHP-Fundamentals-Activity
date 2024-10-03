<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: left;
            margin-top: 50px;
            margin-left: 50px;
        }
        h1 {
            font-size: 2 rem;
        }
        table {
            margin-left: 0; 
            border-collapse: collapse;
            border-spacing: 0 15px;
            width: 40%;
            font-size: 1 rem;
            border: 2px solid black; 
            
        }
        th, td {
            padding: 10px;
            border: 1px solid black; 
        }
    
        select, input[type="number"] {
            padding: 10px;
            width: 200px;
            font-size: 16px;
            margin: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        .receipt {
            border: 2px solid black;
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            text-align: left;
            font-size: 1.5rem;
            font-weight: bold;    
        }
        .receipt h2 {
            text-align: center; 
        }
        .error {
            background-color: #f8d7da;
            padding: 20px;
            border: 1px solid #f5c6cb;
            width: 50%;
            margin: 20px auto;
            text-align: left;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .container {
            text-align: left;
    
        }
        
    </style>
</head>
<body>

    <?php
if (!isset($_POST['submit'])) {
?>
    
    <h1>Menu</h1>
    <div class="container">
        <table border="0">
            <tr>
                <th>Order</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>Burger</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Fries</td>
                <td>75</td>
            </tr>
            <tr>
                <td>Steak</td>
                <td>150</td>
            </tr>
        </table>

        <form method="post" action="">
            <label for="order">Select an order</label>
            <select name="order" id="order" required>
                <option value="Burger">Burger</option>
                <option value="Fries">Fries</option>
                <option value="Steak">Steak</option>
            </select><br>

            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" min="1" required><br>

            <label for="cash">Cash</label>
            <input type="number" name="cash" id="cash" min="1" required><br>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

<?php
} else {
    $order = $_POST['order'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];

    $prices = [
        'Burger' => 50,
        'Fries' => 75,
        'Steak' => 150
    ];

    $total_price = $prices[$order] * $quantity;

    if ($cash >= $total_price) {
        $change = $cash - $total_price;
        date_default_timezone_set('Asia/Manila');
        $date = date('m/d/Y h:i:s a');


        echo "<div class='receipt'>";
        echo "<h2>RECEIPT</h2>";
        echo "<p>Order: $order</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>Total Price: $total_price</p>";
        echo "<p>You Paid: $cash</p>";
        echo "<p>Change: $change</p>";
        echo "<p>Date: $date</p>";
        echo "</div>";
    } else {

        echo "<div class='error'>";
        echo "<p>Sorry, balance not enough.</p>";
        echo "</div>";
    }
}
?>

</body>
</html>
