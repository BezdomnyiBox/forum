<?php include '../views/layouts/header.php'; ?>

<h1>Создать новую тему</h1>

<form method="POST" action="/thread_create.php?category_id=<?= $categoryId ?>">
    <label for="title">Название темы:</label>
    <input type="text" name="title" required>

    <button type="submit">Создать</button>
</form>

<?php include '../views/layouts/footer.php'; ?>
