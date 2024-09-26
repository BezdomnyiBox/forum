<?php

require_once '../models/Category.php';

class CategoryController {

    // Метод для отображения всех категорий
    public function index() {
        $categories = Category::getAll();  // Получаем все категории
        require_once '../views/categories/index.php';  // Подключаем вид для отображения категорий
    }

    // Метод для создания новой категории
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];

            Category::create($name, $description);  // Создаем новую категорию
            header('Location: /categories.php');  // Перенаправляем на список категорий
        } else {
            require_once '../views/categories/create.php';  // Подключаем форму создания категории
        }
    }

    // Метод для просмотра одной категории по ID
    public function show($id) {
        $category = Category::getById($id);  // Получаем категорию по ID
        require_once '../views/categories/show.php';  // Подключаем вид для отображения категории
    }
}
