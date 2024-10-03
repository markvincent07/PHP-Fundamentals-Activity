<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discriminant of a Quadratic Equation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: left;
            margin-top: 50px;
            margin-left: 50px;
        }
        input[type="text"] {
            padding: 10px;
            width: 300px;
            font-size:13px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }
        h1 {
            font-size: 2rem;
        }
    </style>
</head>
<body>

    <?php
    
    if (isset($_POST['submit'])) {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        
        $discriminant = ($b * $b) - (4 * $a * $c);
        
        echo "<h2>$discriminant</h2>";
    } else {
    ?>

    <h1>Discriminant of a Quadratic Equation</h1>
    
    <form method="post" action="">
        <label for="a">A</label>
        <input type="text" name="a" id="a" placeholder="Value of a here" required><br><br>
        
        <label for="b">B</label>
        <input type="text" name="b" id="b" placeholder="Value of b here" required><br><br>
        
        <label for="c">C</label>
        <input type="text" name="c" id="c" placeholder="Value of c here" required><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    }
    ?>

</body>
</html>
