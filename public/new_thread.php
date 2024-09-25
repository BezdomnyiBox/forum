<?php
session_start();
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $user_id = $_SESSION['user_id'];
    $category_id = $_POST['category_id'];

    $stmt = $pdo->prepare("INSERT INTO threads (category_id, user_id, title) VALUES (?, ?, ?)");
    $stmt->execute([$category_id, $user_id, $title]);

    header('Location: category.php?id=' . $category_id);
}
?>

<form method="POST" action="new_thread.php">
    <input type="hidden" name="category_id" value="<?= $_GET['category_id'] ?>">
    <input type="text" name="title" placeholder="Название темы" required>
    <button type="submit">Создать тему</button>
</form>
