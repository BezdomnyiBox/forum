<?php include '../views/layouts/header.php'; ?>

<h1>Создать новую категорию</h1>

<form method="POST" action="/category_create.php">
    <label for="name">Название категории:</label>
    <input type="text" name="name" required>

    <label for="description">Описание категории:</label>
    <textarea name="description"></textarea>

    <button type="submit">Создать</button>
</form>

<?php include '../views/layouts/footer.php'; ?>
