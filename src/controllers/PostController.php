<?php

require_once __DIR__ . '/../models/Post.php';

class PostController {

    // Метод для отображения всех постов в теме
    public function index($threadId) {
        $posts = Post::getByThread($threadId);  // Получаем все посты в теме
        require_once __DIR__ . '/../views/categories/index.php';  // Подключаем вид для отображения постов
    }

    // Метод для создания нового поста
    public function create($threadId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];
            $userId = $_SESSION['user_id'];

            Post::create($threadId, $userId, $content);  // Создаем новый пост
            header('Location: /thread.php?id=' . $threadId);  // Перенаправляем на список постов
        } else {
            require_once __DIR__ . '/../views/posts/create.php';  // Подключаем форму создания поста
        }
    }
}
