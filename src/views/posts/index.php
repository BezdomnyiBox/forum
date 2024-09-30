<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Посты в теме: <?php echo htmlspecialchars($thread['title']); ?></h1>

<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <?= htmlspecialchars($post['content']) ?>
            <p>Автор: <?= htmlspecialchars($post['user_id']) ?>, <?= $post['created_at'] ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<a href="/category/<?= $categoryId ?>/thread/<?= $threadId ?>/create-post">Создать новый пост</a>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>
