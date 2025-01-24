<?php
session_start(); // Запускаем сессию для хранения данных о пользователе

// Получаем сообщение об успешном входе из сессии
$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';

// Очищаем сообщение сразу после его получения
unset($_SESSION['success_message']);
?>

<html lang="ru"> <!-- Указываем язык страницы как русский -->
<head>
    <meta charset="utf-8"> <!-- Устанавливаем кодировку страницы -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Обеспечиваем адаптивность страницы на мобильных устройствах -->
    <title>Неудачная регистрация</title> <!-- Заголовок страницы, отображаемый в браузере -->
    <meta property="og:title" content="Заголовок страницы в OG"> <!-- Заголовок для Open Graph -->
    <meta property="og:description" content="Описание страницы в OG"> <!-- Описание для Open Graph -->
    <meta property="og:image" content="https://example.com/image.jpg"> <!-- Изображение для Open Graph -->
    <meta property="og:url" content="https://example.com/"> <!-- URL страницы для Open Graph -->
    <link rel="stylesheet" href="styles.css"> <!-- Подключение CSS стилей -->
</head>
<body>
    <main> <!-- Основной контент страницы -->
        <form class="form"> <!-- Форма, которая не отправляет данные, но информирует пользователя -->
            <h2>Неудачная регистрация. Попробуйте ещё раз.</h2>
              <?php if (!empty($successMessage)): ?> <!-- Проверяем, есть ли сообщение об успешном входе -->
                <div class="success-message" style="color: red;"> 
                    <?php echo htmlspecialchars($successMessage); ?> <!-- Выводим сообщение с экранированием специальных символов -->
                </div>
            <?php endif; ?>
            <br />
            <a href="registration.php">Вернуться к регистрации</a> <!-- Ссылка для возврата к форме регистрации -->
        </form>
    </main>
</body>
</html>
