<?php
session_start();

if(!$_SESSION['user']) {
    header('Location: /');
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
        <div class="container">
            <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="image">
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['name'] ?></h2>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="vendor/logout.php" class="logout">Logout</a>
        </div>
    </body>
</html>