<?php include '../views/layouts/header.php'; ?>

<h1>Категории форума</h1>

<ul>
    <?php foreach ($categories as $category): ?>
        <li>
            <a href="/category.php?id=<?= $category['id'] ?>">
                <?= htmlspecialchars($category['name']) ?>
            </a>
            <p><?= htmlspecialchars($category['description']) ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<a href="/category_create.php">Создать новую категорию</a>

<?php include '../views/layouts/footer.php'; ?>
