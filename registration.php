<?php
session_start(); // Запускаем сессию для хранения и получения данных сессии

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Проверяем, был ли запрос методом POST
    $name = trim($_POST['name']); // Убираем пробелы с начала и конца строки для имени
    $email = trim($_POST['email']); // Убираем пробелы с начала и конца строки для email
    $password = trim($_POST['password']); // Убираем пробелы с начала и конца строки для пароля
    
    // Проверка на пустые поля
    if (empty($name) || empty($email) || empty($password)) {
        // Сохраняем сообщение об ошибке в сессии и перенаправляем на страницу неудачной регистрации
        $_SESSION['success_message'] = "Неудачная попытка регистрации - пустое поле!";
        header("Location: /registration/data_entered_incorrectly.php"); // Перенаправление на страницу с ошибкой
        exit; // Завершаем выполнение скрипта после перенаправления
    }

    // Проверка корректности email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Проверяем, является ли email корректным
        // Сохраняем сообщение об ошибке в сессии и перенаправляем на страницу неудачной регистрации
        $_SESSION['success_message'] = "Неудачная попытка регистрации - неверный емаил!";
        header("Location: /registration/data_entered_incorrectly.php"); // Перенаправление на страницу с ошибкой
        exit; // Завершаем выполнение скрипта после перенаправления
    }
   
    $conection = mysqli_connect('localhost', 'root', 'root', 'my_db'); // Устанавливаем соединение с базой данных

    // Защита от SQL-инъекций:
    $name_sql = $conection->real_escape_string($name); // Экранируем имя для безопасного SQL-запроса
    $email_sql = $conection->real_escape_string($email); // Экранируем email для безопасного SQL-запроса
    $password_sql = $conection->real_escape_string($password); // Экранируем пароль для безопасного SQL-запроса

    // Хэшируем пароль с использованием безопасного алгоритма
    $password_sql_hash = password_hash($password_sql, PASSWORD_DEFAULT); // Хэшируем пароль

    // Формируем SQL-запрос для вставки новых данных в таблицу users
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name_sql', '$email_sql', '$password_sql_hash')";
    
    // Выполняем SQL-запрос
    if ($conection->query($sql) === TRUE) {
        // Успешное создание новой записи (можно раскомментировать для отладки)
        // echo "New record created successfully";
    } else {
        // Выводим сообщение об ошибке в случае неудачи запроса
        echo "Error: " . $sql . "<br>" . $conection->error;
    }

    // Сохраняем сообщение об успешной регистрации в сессии и перенаправляем на страницу успешной регистрации
    $_SESSION['success_message'] = "Регистрация прошла успешно!";
    header("Location: /registration/succefuly_log_in.php"); // Перенаправление на страницу успешной регистрации
    exit(); // Завершаем выполнение скрипта

    $conection->close(); // Закрываем соединение с базой данных
}
?>
<html lang="ru"> <!-- Указываем язык страницы как русский -->

<head>
    <meta charset="utf-8"> <!-- Устанавливаем кодировку страницы -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Обеспечиваем адаптивность страницы на мобильных устройствах -->
    <title>Sign up</title> <!-- Заголовок страницы, отображаемый в браузере -->
    <meta property="og:title" content="Заголовок страницы в OG"> <!-- Заголовок для Open Graph -->
    <meta property="og:description" content="Описание страницы в OG"> <!-- Описание для Open Graph -->
    <meta property="og:image" content="https://example.com/image.jpg"> <!-- Изображение для Open Graph -->
    <meta property="og:url" content="https://example.com/"> <!-- URL страницы для Open Graph -->
    <link rel="stylesheet" href="styles.css"> <!-- Подключение CSS стилей -->
</head>
<body>
    <main>
        <!-- Форма регистрации -->
        <form class="form" action="registration.php" method="post"> <!-- Указываем обработчик формы и метод отправки данных -->
            <h2>Registration form</h2><br /> <!-- Заголовок формы -->
            
            <div class="nickBox"> <!-- Контейнер для поля ввода ника -->
                <label for="nicknameID">Create nickname:</label><br /> <!-- Подсказка для поля ввода ника -->
                <input type="text" name="name" placeholder="nickname" id="nicknameID" 
                class="form-control <?= isset($errorFields['name']) ? 'error' : '' ?>" required> <!-- Поле ввода ника с условием для ошибки -->
            </div>
            
            <div class="emailBox"> <!-- Контейнер для поля ввода email -->
                <label for="emailAddress">Your email address:</label><br /> <!-- Подсказка для поля ввода email -->
                <input
                    name="email"
                    id="emailAddress"
                    type="email"
                    size="20"
                    maxlength="32"
                    required
                    placeholder="username@gmail.com"
                    class="form-control <?= isset($errorFields['email']) ? 'error' : '' ?>" 
                    title="Please provide only a Best Startup Ever corporate email address" /> <!-- Поле ввода email с условием для ошибки и подсказкой -->
            </div>

            <div class="passwordBox"> <!-- Контейнер для поля ввода пароля -->
                <label for="passwordID">Create password:</label><br /> <!-- Подсказка для поля ввода пароля -->
                <input type="password" name="password" placeholder="password" id="passwordID"  
                class="form-control <?= isset($errorFields['password']) ? 'error' : '' ?>" required> <!-- Поле ввода пароля с условием для ошибки -->
            </div>
            
            <p>
                <input type="submit" value="sign up"> <!-- Кнопка для отправки формы -->
                <a href="authorization.php">Sign in</a> <!-- Ссылка для перехода на страницу авторизации -->
            </p>
        </form>
    </main>
</body>
</html>



