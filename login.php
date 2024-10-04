<?php
session_start();


$message = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    if (isset($_SESSION['logged_in_user'])) {
        $message = "<p>{$_SESSION['logged_in_user']} is already logged in. Wait for them to log out first.</p>";
    } else {
        $_SESSION['logged_in_user'] = $username;
        $_SESSION['hashed_password'] = $hashed_password;

        $message = "<p>User logged in: $username</p><p>Password: $hashed_password</p>";
    }
}


if (isset($_POST['logout'])) {

    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
			margin-left:20px;
			font-size:20px;
        }
        form {
            margin-bottom: 20px;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <p>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required>
        </p>
        <p>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required>
        </p>
        <p>
            <button type="submit" name="login">Login</button>
        </p>
        <p>
            <button type="submit" name="logout">Logout</button>
        </p>
    </form>

    <div class="message">
        <?php echo $message; ?>
    </div>
</body>
</html>
