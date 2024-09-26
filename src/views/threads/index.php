<?php include '../views/layouts/header.php'; ?>

<h1>Темы в категории</h1>

<ul>
    <?php foreach ($threads as $thread): ?>
        <li>
            <a href="/thread.php?id=<?= $thread['id'] ?>">
                <?= htmlspecialchars($thread['title']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<a href="/thread_create.php?category_id=<?= $categoryId ?>">Создать новую тему</a>

<?php include '../views/layouts/footer.php'; ?>
