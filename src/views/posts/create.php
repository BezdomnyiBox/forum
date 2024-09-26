<?php include '../views/layouts/header.php'; ?>

<h1>Добавить новый пост</h1>

<form method="POST" action="/post_create.php?thread_id=<?= $threadId ?>">
    <label for="content">Ваш пост:</label>
    <textarea name="content" required></textarea>

    <button type="submit">Отправить</button>
</form>

<?php include '../views/layouts/footer.php'; ?>
