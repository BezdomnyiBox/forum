<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форум</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header>
    <nav>     
        <a href="/index.php" class="btn">Главная</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="/logout" class="btn">Выход</a>
        <?php else: ?>
            <a href="/login" class="btn">Вход</a>
            <a href="/register" class="btn">Регистрация</a>
        <?php endif; ?>
    </nav>
</header>

<main>
