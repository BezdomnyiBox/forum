<?php

require_once '../models/Thread.php';

class ThreadController {

    // Метод для отображения всех тем в категории
    public function index($categoryId) {
        $threads = Thread::getByCategory($categoryId);  // Получаем темы по ID категории
        require_once '../views/threads/index.php';  // Подключаем вид для отображения списка тем
    }

    // Метод для создания новой темы
    public function create($categoryId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $userId = $_SESSION['user_id'];

            Thread::create($categoryId, $userId, $title);  // Создаем новую тему
            header('Location: /category.php?id=' . $categoryId);  // Перенаправляем на список тем
        } else {
            require_once '../views/threads/create.php';  // Подключаем форму создания темы
        }
    }

    // Метод для просмотра одной темы по ID
    public function show($threadId) {
        $thread = Thread::getById($threadId);  // Получаем тему по ID
        require_once '../views/threads/show.php';  // Подключаем вид для отображения темы
    }
}
