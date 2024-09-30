<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Добавить новый пост</h1>
<?php
// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    echo "<p>Для создания темы вам необходимо авторизоваться. <a href='/login'>Войти</a></p>";
    include '../src/views/layouts/footer.php';
    exit();
}
?>

<form method="POST" action="/category/<?= $categoryId ?>/thread/<?= $threadId ?>/create-post">
    <label for="content">Ваш пост:</label>
    <textarea name="content" required></textarea>

    <button type="submit">Отправить</button>
</form>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>
