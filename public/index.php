<?php
require '../config/db.php';

$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll();
?>

<h1>Категории форума</h1>

<ul>
    <?php foreach ($categories as $category): ?>
        <li>
            <a href="category.php?id=<?= $category['id'] ?>">
                <?= htmlspecialchars($category['name']) ?>
            </a>
            <p><?= htmlspecialchars($category['description']) ?></p>
        </li>
    <?php endforeach; ?>
</ul>
