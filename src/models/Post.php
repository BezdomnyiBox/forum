<?php

// Правильный путь к файлу db.php
require_once __DIR__ . '/../../config/db.php';

class Post {

    public static function getByThread($threadId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE thread_id = ?");
        $stmt->execute([$threadId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($threadId, $userId, $content) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO posts (thread_id, user_id, content) VALUES (?, ?, ?)");
        $stmt->execute([$threadId, $userId, $content]);
    }
}
