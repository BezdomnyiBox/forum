<?php
require '../config/db.php';

$thread_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE thread_id = ?");
$stmt->execute([$thread_id]);
$posts = $stmt->fetchAll();
?>

<h1>Посты в теме</h1>

<ul>
    <?php foreach ($posts as $post): ?>
        <li><?= htmlspecialchars($post['content']) ?> (<?= $post['created_at'] ?>)</li>
    <?php endforeach; ?>
</ul>

<form method="POST" action="thread.php?id=<?= $thread_id ?>">
    <textarea name="content" placeholder="Ваш пост" required></textarea>
    <button type="submit">Отправить</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO posts (thread_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->execute([$thread_id, $user_id, $content]);

    header("Location: thread.php?id=" . $thread_id);
}
?>
