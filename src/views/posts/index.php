<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Посты в теме</h1>

<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <?= htmlspecialchars($post['content']) ?>
            <p>Автор: <?= htmlspecialchars($post['user_id']) ?>, <?= $post['created_at'] ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<form method="POST" action="/post_create.php?thread_id=<?= $threadId ?>">
    <textarea name="content" required></textarea>
    <button type="submit">Добавить пост</button>
</form>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>
