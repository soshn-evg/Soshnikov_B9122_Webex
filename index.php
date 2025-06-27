<?php
if (!isset($_COOKIE['User'])) {
    header('Location: /login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeoSite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>
<body class="bg-dark text-white">

    <nav class="navbar navbar-expand-lg navbar-light bg-light-subtle shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navMenu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="/logout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero d-flex align-items-center justify-content-center text-center p-5">
        <div>
            <h1 class="display-4">Привет, <?= htmlspecialchars($_COOKIE['User'] ?? 'Guest') ?></h1>
            <p class="lead mt-3">Добро пожаловать!</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap @5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>