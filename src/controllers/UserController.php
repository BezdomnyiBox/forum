<?php

require_once '../models/User.php';

class UserController {

    // Метод для регистрации пользователя
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Хешируем пароль

            User::create($username, $password);  // Создаем нового пользователя
            header('Location: /login.php');  // Перенаправляем на страницу авторизации
        } else {
            require_once '../views/users/register.php';  // Подключаем форму регистрации
        }
    }

    // Метод для авторизации пользователя
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::findByUsername($username);  // Ищем пользователя по имени

            if ($user && password_verify($password, $user['password'])) {  // Проверяем пароль
                $_SESSION['user_id'] = $user['id'];  // Устанавливаем сессию
                header('Location: /index.php');  // Перенаправляем на главную страницу
            } else {
                echo "Неверные учетные данные.";  // Если данные неверны, выводим сообщение
            }
        } else {
            require_once '../views/users/login.php';  // Подключаем форму авторизации
        }
    }

    // Метод для выхода из системы
    public function logout() {
        session_start();
        session_destroy();  // Удаляем сессию
        header('Location: /login.php');  // Перенаправляем на страницу авторизации
    }
}
