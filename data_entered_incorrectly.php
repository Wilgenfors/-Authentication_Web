<?php
session_start(); // Запускаем сессию для хранения данных о пользователе

if (isset($_SESSION['success_message'])) {
    // Если сообщение существует, можно было бы его вывести
    unset($_SESSION['success_message']); // Очищаем сообщение после его вывода
}
?>
<html lang="ru"> <!-- Указываем язык страницы как русский -->
<head>
    <meta charset="utf-8"> <!-- Устанавливаем кодировку страницы -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Обеспечиваем адаптивность страницы на мобильных устройствах -->
    <title>Not succefuly sing up</title> <!-- Заголовок страницы, отображаемый в браузере -->
    <meta property="og:title" content="Zagolovok stranitsy v OG"> <!-- Заголовок для Open Graph -->
    <meta property="og:description" content="Opisanie stranitsy v OG"> <!-- Описание для Open Graph -->
    <meta property="og:image" content="https://example.com/image.jpg"> <!-- Изображение для Open Graph -->
    <meta property="og:url" content="https://example.com/"> <!-- URL страницы для Open Graph -->
    <link rel="stylesheet" href="styles.css"> <!-- Подключение CSS стилей -->
</head>
<body>
    <main> <!-- Основной контент страницы -->
        <form class="form"> <!-- Форма, которая не отправляет данные, но информирует пользователя -->
            <h2>Неудачная регистрация попробуйте ещё раз.</h2><br /> <!-- Заголовок с сообщением об ошибке регистрации -->
            <a href="registration.php">Return to registration</a> <!-- Ссылка для возврата к форме регистрации -->
        </form>
    </main>
</body>
</html>