<?php

// Старт сессии для авторизации пользователей
session_start();

// Подключаем необходимые файлы
require_once __DIR__ . '/../config/db.php';  // Подключение к базе данных
require_once __DIR__ . '/../src/controllers/CategoryController.php';
require_once __DIR__ . '/../src/controllers/ThreadController.php';
require_once __DIR__ . '/../src/controllers/PostController.php';
require_once __DIR__ . '/../src/controllers/UserController.php';

// Получаем URI запроса
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Маршрутизация по URI
if ($uri === '/' || $uri === '/index.php') {
    // Главная страница — список категорий
    $controller = new CategoryController();
    $controller->index();
} elseif ($uri === '/category' && isset($_GET['id'])) {
    // Страница конкретной категории — список тем
    $controller = new ThreadController();
    $controller->index($_GET['id']);
} elseif ($uri === '/create-category') {
    // Страница конкретной категории — список тем
    $controller = new CategoryController();
    $controller->create();
} elseif ($uri === '/store-category' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new CategoryController();
    $controller->store();
} elseif ($uri === '/thread' && isset($_GET['id'])) {
    // Страница конкретной темы — список постов
    $controller = new PostController();
    $controller->index($_GET['id']);
} elseif ($uri === '/register') {
    // Страница регистрации
    $controller = new UserController();
    $controller->register();
} elseif ($uri === '/login') {
    // Страница входа в систему
    $controller = new UserController();
    $controller->login();
} elseif ($uri === '/logout') {
    // Страница выхода из системы
    $controller = new UserController();
    $controller->logout();
} else {
    // Страница не найдена
    http_response_code(404);
    echo "404 - Страница не найдена";
}

