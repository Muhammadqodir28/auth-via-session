<?php
session_start();
require_once 'connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if($password === $password_confirm) {
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    $imageFileType = strtolower(pathinfo('../' . $path, PATHINFO_EXTENSION));

    // Verify file size - 2MB max
    $maxsize = 2 * 1024 * 1024;

    if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != null) {
        $_SESSION['message'] = 'Sorry, only JPG, JPEG, PNG files are allowed';
        return header('Location: ../register.php');
    } elseif($_FILES['avatar']['size'] > $maxsize) {
        $_SESSION['message'] = 'Sorry, your file is too large';
        return header('Location: ../register.php');
    } else {
        if($_FILES['avatar']['name']) {
            move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path);
        } else {
            $path = 'No Image';
        }
    }

    $password = md5($password);
    $check_email = $pdo->prepare("SELECT * FROM users WHERE email = '$email'");
    $check_email->execute();
    $checking = $check_email->fetch();
    if($checking) {
        $_SESSION['message'] = 'This email has already been registered';
        return header('Location: ../register.php');
    }

    $insert = $pdo->prepare("INSERT INTO users (name, email, password, avatar) VALUES (:name, :email, :password, :avatar)");
    $insert->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'avatar' => $path
    ]);

    $_SESSION['message'] = 'You are successfully register!';
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Passwords do not match';
    header('Location: ../register.php');
}