<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Создать новую категорию</h1>

<form action="/category/create" method="POST">
    <label for="name">Название категории:</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Описание:</label>
    <textarea name="description" id="description" required></textarea>

    <button type="submit">Создать категорию</button>
</form>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>
