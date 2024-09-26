<?php

class Thread {
    // Получаем все темы в конкретной категории
    public static function getByCategory($categoryId) {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->prepare("SELECT * FROM threads WHERE category_id = ?");
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Создаем новую тему
    public static function create($categoryId, $userId, $title) {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->prepare("INSERT INTO threads (category_id, user_id, title) VALUES (?, ?, ?)");
        $stmt->execute([$categoryId, $userId, $title]);
    }

    // Получаем тему по ID
    public static function getById($threadId) {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->prepare("SELECT * FROM threads WHERE id = ?");
        $stmt->execute([$threadId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
