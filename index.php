<?php
session_start();

if(isset($_SESSION['user'])) {
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Authentication</title>
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <form action="vendor/signin.php" method="POST">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>You don't have an account? - <a href="./register.php">Register</a></p>
            <?php
            if(isset($_SESSION['message'])) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
    </body>
</html>