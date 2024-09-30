<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Темы в категории: <?php echo htmlspecialchars($category['name']); ?></h1>

<ul>
    <?php foreach ($threads as $thread): ?>
        <li>
            <a href="/category/<?php echo htmlspecialchars($category['id']); ?>/thread/<?php echo htmlspecialchars($thread['id']); ?>">
                <?php echo htmlspecialchars($thread['title']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<a href="/category/<?= $categoryId ?>/create-thread">Создать новую тему</a>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>