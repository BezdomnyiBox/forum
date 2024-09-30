<?php

require_once __DIR__ . '/../models/Post.php';

class PostController {

    // Метод для отображения всех постов в теме
    public function index($categoryId, $threadId) {
        $thread = Thread::getById($threadId);
        $posts = Post::getByThread($threadId);  // Получаем все посты в теме
        require_once __DIR__ . '/../views/posts/index.php';  // Подключаем вид для отображения постов
    }

    // Метод для создания нового поста
    public function create($categoryId, $threadId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];
            $userId = $_SESSION['user_id'];

            Post::create($threadId, $userId, $content);  // Создаем новый пост
            header("Location: /category/$categoryId/thread/$threadId");  // Перенаправляем на список постов
        } else {
            require_once __DIR__ . '/../views/posts/create.php';  // Подключаем форму создания поста
        }
    }
}
