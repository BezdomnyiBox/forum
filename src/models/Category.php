<?php

class Category {
    // Получаем все категории из базы данных
    public static function getAll() {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Получаем категорию по ID
    public static function getById($id) {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Создаем новую категорию
    public static function create($name, $description) {
        require_once '../config/db.php';  // Подключение к БД
        $stmt = $pdo->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
        $stmt->execute([$name, $description]);
    }
}

