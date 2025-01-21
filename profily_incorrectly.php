<?php
session_start(); // Запускаем сессию для хранения данных о пользователе

// Проверяем, есть ли сообщение об успешном входе
if (isset($_SESSION['success_message'])) {
    // Если сообщение существует, можно было бы его вывести
    //echo htmlspecialchars($_SESSION['success_message']); // Выводим сообщение, экранируя специальные символы для безопасности
    unset($_SESSION['success_message']); // Очищаем сообщение после его вывода
}
?>

<html lang="ru"> <!-- Устанавливаем язык страницы -->
<head>
    <meta charset="utf-8"> <!-- Задаем кодировку страницы -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Настройка для адаптивного дизайна -->
    <title>Неудачный вход</title> <!-- Заголовок страницы -->
    <meta property="og:title" content="Заголовок страницы в OG"> <!-- Заголовок для Open Graph -->
    <meta property="og:description" content="Описание страницы в OG"> <!-- Описание для Open Graph -->
    <meta property="og:image" content="https://example.com/image.jpg"> <!-- Изображение для Open Graph -->
    <meta property="og:url" content="https://example.com/"> <!-- URL для Open Graph -->
    <link rel="stylesheet" href="styles.css"> <!-- Подключение внешнего CSS-файла -->
</head>
<body>
    <main>
        <form class="form"> <!-- Форма для отображения информации о неудачной попытке входа -->
            <h2>Неудачная попытка входа, попробуйте ещё раз.</h2><br /> <!-- Сообщение для пользователя -->
            <a href="authorization.php">Return to authorization</a> <!-- Ссылка для возврата на страницу авторизации -->
        </form>
    </main>
</body>
</html>