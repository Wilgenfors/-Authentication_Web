<?php
session_start(); // Запускаем сессию для хранения данных о пользователе

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Проверяем, был ли отправлен POST-запрос
    $email = trim($_POST['email']); // Получаем и обрезаем пробелы в email
    $password = trim($_POST['password']); // Получаем и обрезаем пробелы в пароле
    
    // Проверка на пустые поля
    if (empty($email) || empty($password)) {
        // echo "empty email or password"; // Закомментированная строка для отладки

        // var_dump($password); // Закомментированная строка для отладки
        $_SESSION['success_message'] = "Неудачная попытка входа - незаполнены данные!"; // Устанавливаем сообщение об ошибке
        header("Location: /profily_incorrectly.php"); // Перенаправляем на страницу с ошибкой
        exit; // Завершаем выполнение скрипта
    }

    // Проверка корректности email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // echo "неправильный email"; // Закомментированная строка для отладки

        $_SESSION['success_message'] = "Неудачная попытка входа - неправильно введённый email!"; // Устанавливаем сообщение об ошибке
        header("Location: /profily_incorrectly.php"); // Перенаправляем на страницу с ошибкой
        exit; // Завершаем выполнение скрипта
    }

    // Подключение к базе данных
    $conection = mysqli_connect('localhost', 'b95270ap_my_db', '123QWE!', 'b95270ap_my_db'); // Устанавливаем соединение с базой данных
    if (!$conection) { // Проверяем, удалось ли подключиться
        die("Ошибка подключения: " . mysqli_connect_error()); // Завершаем выполнение скрипта с сообщением об ошибке
    }

    // Экранирование входных данных для защиты от SQL-инъекций
    $email_sql = $conection->real_escape_string($email); // Экранируем email
    $password_sql = $conection->real_escape_string($password); // Экранируем пароль

    // Проверяем, есть ли такой пользователь по email
    $check_user = mysqli_query($conection, "SELECT * FROM users WHERE email = '$email_sql'"); // Выполняем запрос к базе данных
    
    // var_dump($check_user); // Закомментированная строка для отладки
    // Проверка результата запроса
    if (mysqli_num_rows($check_user) > 0) { // Если пользователь найден
        $user = mysqli_fetch_assoc($check_user); // Получаем данные пользователя
        // Проверка пароля
        if (password_verify($password_sql, $user['password'])) { // Если пароль верный
            // Успешный вход
            $_SESSION['success_message'] = "Вы вошли в свой профиль"; // Устанавливаем сообщение об успешном входе
            header("Location: /profily_succefuly.php"); // Перенаправляем на страницу профиля
            exit(); // Завершаем выполнение скрипта
        } else {
            // Неправильный пароль
            $_SESSION['success_message'] = "Неудачная попытка входа - неправильный пароль!"; // Устанавливаем сообщение об ошибке
            header("Location: /profily_incorrectly.php"); // Перенаправляем на страницу с ошибкой
            exit(); // Завершаем выполнение скрипта
        }
    } else {
        // Пользователь не найден
        $_SESSION['success_message'] = "Неудачная попытка входа - пользователь не найден!"; // Устанавливаем сообщение об ошибке
        header("Location: /profily_incorrectly.php"); // Перенаправляем на страницу с ошибкой
        exit(); // Завершаем выполнение скрипта
    }

    // Закрытие соединения с базой данных
    $conection->close(); // Закрываем соединение
}
?>
<html lang="ru"> <!-- Указываем язык страницы как русский -->

<head>
    <meta charset="utf-8"> <!-- Устанавливаем кодировку страницы -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Обеспечиваем адаптивность страницы на мобильных устройствах -->
    <title>Sign in</title> <!-- Заголовок страницы, отображаемый в браузере -->
    <meta property="og:title" content="Заголовок страницы в OG"> <!-- Заголовок для Open Graph -->
    <meta property="og:description" content="Описание страницы в OG"> <!-- Описание для Open Graph -->
    <meta property="og:image" content="https://example.com/image.jpg"> <!-- Изображение для Open Graph -->
    <meta property="og:url" content="https://example.com/"> <!-- URL страницы для Open Graph -->
    <link rel="stylesheet" href="styles.css"> <!-- Подключение CSS стилей -->
</head>

<body>
    <main> 
        <!-- основная часть страницы -->
        <form class="form" action="authorization.php" method="post"> 
            <!-- Форма для авторизации пользователя -->
            <h2>Log in to the site</h2><br /> <!-- Заголовок формы -->
            
            <style>
                .invalid-control { /* Стили для неверного ввода */
                    border-color: red !important; /* Устанавливаем красную рамку для неверного ввода */
                }

                .form-control { /* Основные стили для полей ввода */
                    border: 1px solid; /* Устанавливаем границу для полей ввода */
                }
            </style>
            
            <div class="EmailBox">
                <label for="Email_ID">Enter your email:</label><br /> <!-- Подсказка для поля email -->
                <input type="email" class="form-control" name="email" placeholder="E-mail" id="Email_ID" required> <!-- Поле ввода email -->
            </div>
            
            <div class="passwBox">
                <label for="password_ID">Enter your password:</label><br /> <!-- Подсказка для поля пароля -->
                <input type="password" class="form-control" name="password" placeholder="password" id="password_ID" required> <!-- Поле ввода пароля -->
            </div>
            
            <p>
                <input type="submit" value="Sign in"> <!-- Кнопка для отправки формы -->
                <a href="registration.php">Sign up</a> <!-- Ссылка для перехода на страницу регистрации -->
            </p>
        </form>
    </main>
</body>
</html>
