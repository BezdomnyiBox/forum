<?php

// Правильный путь к файлу db.php
require_once __DIR__ . '/../../config/db.php';// Подключаем файл с PDO для работы с базой данных

class Category {

    // Получаем все категории
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Получаем категорию по ID
    public static function getById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Создаем новую категорию
    public static function create($name, $description) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
        $stmt->execute([$name, $description]);
    }
}

