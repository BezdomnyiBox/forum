<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Создать новую тему</h1>
<?php
// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    echo "<p>Для создания темы вам необходимо авторизоваться. <a href='/login'>Войти</a></p>";
    include '../src/views/layouts/footer.php';
    exit();
}
?>

<form method="POST" action="/category/<?= $categoryId ?>/create-thread">
    <label for="title">Название темы:</label>
    <input type="text" name="title" required>

    <button type="submit">Создать</button>
</form>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>
