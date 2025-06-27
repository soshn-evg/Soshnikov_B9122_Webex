<?php
require_once('db.php');

if (isset($_COOKIE['User'])){
    header("Location: /index.php");
    exit();
}

$link = mysqli_connect('db', 'root', 'root', 'web_app_db');

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (!$login || !$email || !$pass) die ("Пожалуйста, заполните все поля");

    $sql = "INSERT INTO users (username, email, pass) VALUES ('$login', '$email', '$pass')";

    if (!mysqli_query($link, $sql)){
        echo "<div class='alert alert-danger'>Ошибка регистрации</div>";
    } else {
        header("Location: /login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | NeoSite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>
<body class="bg-dark text-white">

    <section class="register-section d-flex align-items-center justify-content-center min-vh-100">
        <div class="card p-4 shadow-lg rounded-4 bg-dark border border-secondary w-100" style="max-width: 400px;">
            <h2 class="text-center mb-4 neon-text">Регистрация</h2>
            <form action="/registration.php" method="POST">
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" name="login" id="login" class="form-control input-glass" placeholder="Введите логин">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control input-glass" placeholder="Введите email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control input-glass" placeholder="Введите пароль">
                </div>
                <button type="submit" name="submit" class="btn btn-neon w-100">Зарегистрироваться</button>
                <p class="text-center mt-3">Уже есть аккаунт? <a href="/login.php" class="neon-link">Войти</a></p>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap @5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>