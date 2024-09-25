<?php
require '../config/db.php';

$category_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM threads WHERE category_id = ?");
$stmt->execute([$category_id]);
$threads = $stmt->fetchAll();
?>

<h1>Темы в категории</h1>
<a href="new_thread.php?category_id=<?= $category_id ?>">Создать новую тему</a>

<ul>
    <?php foreach ($threads as $thread): ?>
        <li>
            <a href="thread.php?id=<?= $thread['id'] ?>">
                <?= htmlspecialchars($thread['title']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
