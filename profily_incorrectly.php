<?php
session_start(); // Запускаем сессию для хранения данных о пользователе

// Получаем сообщение об успешном входе из сессии
$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';

// Очищаем сообщение сразу после его получения
unset($_SESSION['success_message']);
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
            
            <?php if (!empty($successMessage)): ?> <!-- Проверяем, есть ли сообщение об успешном входе -->
                <div class="success-message" style="color: red;"> 
                    <?php echo htmlspecialchars($successMessage); ?> <!-- Выводим сообщение с экранированием специальных символов -->
                </div>
            <?php endif; ?>

            <a href="authorization.php">Вернуться к авторизации</a> <!-- Ссылка для возврата на страницу авторизации -->
        </form>
    </main>
</body>
</html>
