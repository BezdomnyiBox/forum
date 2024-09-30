<?php

require_once __DIR__ . '/../models/Category.php';

class CategoryController {

    // Метод для отображения всех категорий
    public function index() {
        $categories = Category::getAll();  // Получаем все категории
        require_once __DIR__ . '/../views/categories/index.php';  // Подключаем вид для отображения категорий
    }

    // Метод для создания новой категории
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['name']) && !empty($_POST['description'])) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                Category::create($name, $description);
                header('Location: /category'); // Перенаправляем на страницу с категориями после создания категории
            } else {
                echo "Пожалуйста, заполните все поля.";
            }

        } else {
            require_once __DIR__ . '/../views/categories/create.php';  // Подключаем форму создания категории
        }
    }

    // Метод для просмотра одной категории по ID
    public function show($id) {
        $category = Category::getById($id);  // Получаем категорию по ID
        require_once __DIR__ . '/../views/categories/show.php';  // Подключаем вид для отображения категории
    }
}
