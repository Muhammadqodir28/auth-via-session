<?php
session_start();
require_once 'connect.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$check_user = $pdo->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
$check_user->execute();
$user = $check_user->fetch();
if($user) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'avatar' => $user['avatar'],
        'email' => $user['email']
    ];
    header('Location: ../profile.php');
} else {
    $_SESSION['message'] = 'Invalid email or password';
    header('Location: ../index.php');
}