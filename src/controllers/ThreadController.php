<?php

require_once __DIR__ . '/../models/Thread.php';
require_once __DIR__ . '/../models/Category.php';

class ThreadController {

    // Метод для отображения всех тем в категории
    public function index($categoryId) {
        $category = Category::getById($categoryId);
        if ($category) {
            $threads = Thread::getByCategory($categoryId);
            require_once __DIR__ . '/../views/threads/index.php';  // Подключаем вид для отображения списка тем
        } else {
            http_response_code(404);
            echo "404 - Категория не найдена";
        }
    }

    // Метод для создания новой темы
    public function create($categoryId) {

        // Получаем информацию о категории
        $category = Category::getById($categoryId);
        if (!$category) {
            http_response_code(404);
            echo "404 - Категория не найдена";
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['title'])) {
                $title = $_POST['title'];
                $userId = $_SESSION['user_id']; // Предполагается, что пользователь авторизован
                Thread::create($categoryId, $userId, $title);
                header("Location: /category/$categoryId");
            } else {
                echo "Пожалуйста, заполните все поля.";
            }
        } else {
            require_once __DIR__ . '/../views/threads/create.php';  // Подключаем форму создания темы
        }
    }

    // Метод для просмотра одной темы по ID
    public function show($threadId) {
        $thread = Thread::getById($threadId);  // Получаем тему по ID
        require_once __DIR__ . '/../views/threads/show.php';  // Подключаем вид для отображения темы
    }
}
