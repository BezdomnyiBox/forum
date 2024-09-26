<?php

// Старт сессии
session_start();

// Подключаем автозагрузчик (например, от Composer)
require_once '../vendor/autoload.php'; // Если используешь Composer

// Или вручную подключаем файлы
require_once '../config/db.php';       // Подключение к базе данных
require_once '../controllers/CategoryController.php';
require_once '../controllers/ThreadController.php';
require_once '../controllers/PostController.php';
require_once '../controllers/UserController.php';

// Простая маршрутизация для разных страниц сайта
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '/index.php') {
    // Главная страница (список категорий)
    $controller = new CategoryController();
    $controller->index();
} elseif ($uri === '/category.php' && isset($_GET['id'])) {
    // Страница категории (список тем)
    $controller = new ThreadController();
    $controller->index($_GET['id']);
} elseif ($uri === '/thread.php' && isset($_GET['id'])) {
    // Страница темы (список постов)
    $controller = new PostController();
    $controller->index($_GET['id']);
} elseif ($uri === '/register.php') {
    // Регистрация пользователя
    $controller = new UserController();
    $controller->register();
} elseif ($uri === '/login.php') {
    // Вход пользователя
    $controller = new UserController();
    $controller->login();
} else {
    // Страница не найдена
    http_response_code(404);
    echo "404 - Страница не найдена";
}
