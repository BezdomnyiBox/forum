<?php

class Post {
    // Получаем все посты в конкретной теме
    public static function getByThread($threadId) {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE thread_id = ?");
        $stmt->execute([$threadId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Создаем новый пост
    public static function create($threadId, $userId, $content) {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->prepare("INSERT INTO posts (thread_id, user_id, content) VALUES (?, ?, ?)");
        $stmt->execute([$threadId, $userId, $content]);
    }
}
