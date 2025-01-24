<?php
session_start(); // Запускаем сессию для хранения данных о пользователе

// Получаем сообщение об успешной регистрации из сессии
$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';

// Очищаем сообщение после его использования
unset($_SESSION['success_message']);
?>

<html lang="ru"> <!-- Устанавливаем язык страницы -->
<head>
    <meta charset="utf-8"> <!-- Задаем кодировку страницы -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Настройка для адаптивного дизайна -->
    <title>Успешная регистрация</title> <!-- Заголовок страницы, отображаемый на вкладке браузера -->
    <meta property="og:title" content="Заголовок страницы в OG"> <!-- Заголовок страницы для Open Graph -->
    <meta property="og:description" content="Описание страницы в OG"> <!-- Описание для Open Graph -->
    <meta property="og:image" content="https://example.com/image.jpg"> <!-- Изображение для Open Graph -->
    <meta property="og:url" content="https://example.com/"> <!-- URL для Open Graph -->
    <link rel="stylesheet" href="styles.css"> <!-- Подключение внешнего CSS-файла -->
</head>
<body>
    <main> <!-- Основной контент страницы -->
        <form class="form"> <!-- Форма, хотя в данном случае она не отправляет данные -->
            <h2>Вы вошли в свой профиль</h2><br /> <!-- Сообщение о том, что пользователь уже вошел в склад -->
        </form> <!-- Закрытие формы -->
    </main>
</body>
</html>
