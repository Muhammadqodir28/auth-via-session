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
        <form action="vendor/signup.php" method="POST" enctype="multipart/form-data">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" required>
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" required>
            <label>Image</label>
            <input type="file" name="avatar">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <label>Confirm</label>
            <input type="password" name="password_confirm" placeholder="Confirm" required>
            <button type="submit">Register</button>
            <p>You have an account? - <a href="./">Login</a></p>
            <?php
            if(isset($_SESSION['message'])) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
    </body>
</html>