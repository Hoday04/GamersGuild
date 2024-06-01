<?php
require_once('db_connect.php');

function login($db) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE login = '$username' AND password = '$password'";
    $result = $db->query($sql) ?? die("Ошибка подключения к базе данных");

    if ($result->num_rows > 0) {
        // Получение данных пользователя из результата запроса
        $user = $result->fetch_assoc();
        $userId = $user['id']; // Получение ID пользователя

        // Начало сессии
        session_start();
        // Запись ID пользователя в сессию
        $_SESSION['user_id'] = $userId;
        echo '<script>Вы авторизованы</script>';
        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php");
        echo '<script>Неверный логин или пароль</script>';
        exit();
    }
}

$db_connection = new db_connect();
$db = $db_connection->connect();

login($db);
?>