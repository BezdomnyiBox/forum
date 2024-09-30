<?php

session_start();

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/controllers/CategoryController.php';
require_once __DIR__ . '/../src/controllers/ThreadController.php';
require_once __DIR__ . '/../src/controllers/UserController.php';
require_once __DIR__ . '/../src/controllers/PostController.php';

// Получаем URI запроса и убираем ведущие и завершающие слэши
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Разбиваем URI на части
$segments = explode('/', $uri);

// Маршрутизация с использованием switch
switch ($segments[0]) {
    case '':
    case 'index.php':
        // Главная страница — список категорий
        $controller = new CategoryController();
        $controller->index();
        break;

    case 'category':
        if (!isset($segments[1])) {
            // Страница со всеми категориями
            $controller = new CategoryController();
            $controller->index();
        } else {
            $categoryId = $segments[1];

            // Определяем действие для категории
            if (is_numeric($categoryId)) {
                // Если сегмент — число, то это ID категории, поэтому обрабатываем как категорию
                if (!isset($segments[2])) {
                    // Показать список тем в категории
                    $controller = new ThreadController();
                    $controller->index($categoryId);
                } else {
                    // Дополнительное действие для категории (например, создание темы в категории)
                    switch ($segments[2]) {
                        case 'create-thread':
                            // Страница для создания новой темы в категории
                            $controller = new ThreadController();
                            $controller->create($categoryId);
                            break;
                        case 'thread':
                            $threadId = $segments[3];
                            if (is_numeric($threadId)) {
                                if (!isset($segments[4])) {
                                    // Показать список тем в категории
                                    $controller = new PostController();
                                    $controller->index($categoryId, $threadId);
                                    // Отображение конкретной темы
                                } else {
                                    switch ($segments[4]) {
                                        case 'create-post':
                                            // Страница для создания новой темы в категории
                                            $controller = new PostController();
                                            $controller->create($threadId, $categoryId);
                                            break;
                                    }
                                }
                            } else {
                                http_response_code(404);
                                echo "404 - Страница не найдена";
                            }
                            break;
                        default:
                            http_response_code(404);
                            echo "404 - Страница не найдена";
                            break;
                    }
                }
            } 
            elseif ($categoryId === 'create') {
                // Создание новой категории (форма для создания)
                $controller = new CategoryController();
                $controller->create();
            }
            else {
                http_response_code(404);
                echo "404 - Страница не найдена";
            }
        }
        break;




    case 'thread':
        if (isset($segments[1])) {
            // Страница конкретной темы — список постов
            $controller = new ThreadController();
            $controller->show($segments[1]);
        } else {
            http_response_code(404);
            echo "404 - Страница не найдена";
        }
        break;

    case 'login':
        // Страница входа в систему
        $controller = new UserController();
        $controller->login();
        break;

    case 'logout':
        // Страница входа в систему
        $controller = new UserController();
        $controller->logout();
        break;

    case 'register':
        // Страница регистрации
        $controller = new UserController();
        $controller->register();
        break;

    default:
        // Если маршрут не найден
        http_response_code(404);
        echo "404 - Страница не найдена";
        break;
}

