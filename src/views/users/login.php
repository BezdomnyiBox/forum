<?php include '../views/layouts/header.php'; ?>

<h1>Вход</h1>

<form method="POST" action="/login.php">
    <label for="username">Имя пользователя:</label>
    <input type="text" name="username" required>

    <label for="password">Пароль:</label>
    <input type="password" name="password" required>

    <button type="submit">Войти</button>
</form>

<?php include '../views/layouts/footer.php'; ?>
