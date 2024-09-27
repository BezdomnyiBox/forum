<?php

// Правильный путь к файлу db.php
require_once __DIR__ . '/../../config/db.php';

class Thread {

    public static function getByCategory($categoryId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM threads WHERE category_id = ?");
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($categoryId, $userId, $title) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO threads (category_id, user_id, title) VALUES (?, ?, ?)");
        $stmt->execute([$categoryId, $userId, $title]);
    }

    public static function getById($threadId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM threads WHERE id = ?");
        $stmt->execute([$threadId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
