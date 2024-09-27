<?php include_once __DIR__ . '/../layouts/header.php'; ?>

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

<a href="/create.php">Создать новую категорию</a>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>
