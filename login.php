<?php
require_once('db.php');

if (isset($_COOKIE['User'])){
    header("Location: /index.php");
    exit();
}

$link = mysqli_connect('db', 'root', 'root', 'web_app_db');

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $pass = $_POST['password'];

    if (!$login || !$pass) die ("Пожалуйста, заполните все поля");

    $sql = "SELECT * FROM users WHERE username='$login' AND pass='$pass'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1){
        setcookie("User", $login, time()+7200);
        header("Location: /index.php");
    } else {
        echo "<div class='alert alert-danger'>Неверный логин или пароль</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | NeoSite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>
<body class="bg-dark text-white">

    <section class="login-section d-flex align-items-center justify-content-center min-vh-100">
        <div class="card p-4 shadow-lg rounded-4 bg-dark border border-secondary w-100" style="max-width: 400px;">
            <h2 class="text-center mb-4 neon-text">Вход</h2>
            <form action="/login.php" method="POST">
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" name="login" id="login" class="form-control input-glass" placeholder="Введите логин">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control input-glass" placeholder="Введите пароль">
                </div>
                <button type="submit" name="submit" class="btn btn-neon w-100">Войти</button>
                <p class="text-center mt-3">Нет аккаунта? <a href="/registration.php" class="neon-link">Зарегистрироваться</a></p>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap @5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>