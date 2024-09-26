<?php

class User {
    // Создаем нового пользователя
    public static function create($username, $password) {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
    }

    // Получаем пользователя по имени
    public static function findByUsername($username) {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
