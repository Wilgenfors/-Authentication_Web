<?php
session_start(); // Запускаем сессию, чтобы иметь возможность хранить и получать данные сессии

// Проверяем, есть ли сообщение об успешной регистрации
$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';

// Очищаем сообщение после его использования
unset($_SESSION['success_message']);
?>

<html lang="ru">
<head>
    <meta charset="utf-8"> <!-- Устанавливаем кодировку страницы -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Настройки для адаптивного дизайна -->
    <title>Успешная регистрация</title> <!-- Заголовок страницы -->
    <meta property="og:title" content="Успешная регистрация на сайте"> <!-- Заголовок для Open Graph -->
    <meta property="og:description" content="Данные успешно зарегистрированы."> <!-- Описание для Open Graph -->
    <meta property="og:image" content="https://example.com/image.jpg"> <!-- Изображение для Open Graph -->
    <meta property="og:url" content="https://example.com/"> <!-- URL для Open Graph -->
    <link rel="stylesheet" href="styles.css"> <!-- Подключаем CSS файл -->
</head>
<body>
    <main>
        <form class="form"> <!-- Форма с классом "form" для применения стилей -->
            <h2>Регистрация прошла успешно</h2><br /> <!-- Заголовок формы -->
            
        </form>
    </main>
</body>
</html>
