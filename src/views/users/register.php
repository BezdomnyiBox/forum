<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Регистрация</h1>

<form method="POST" action="/register.php">
    <label for="username">Имя пользователя:</label>
    <input type="text" name="username" required>

    <label for="password">Пароль:</label>
    <input type="password" name="password" required>

    <button type="submit">Зарегистрироваться</button>
</form>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>
