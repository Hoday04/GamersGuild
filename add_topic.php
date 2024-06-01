<?php
require_once('db_connect.php');

function create_topic($db) {
    $create_title = $_POST['create_title'];
    $create_text = $_POST['create_text'];
    $user_id = 0;
    // Начало сессии
    session_start();

    // Проверка наличия значения 'user_id' в сессии
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        echo '<script>alert("Вы не авторизованы.");</script>';
        exit();
    }
    // Get the maximum ID value
    $msql = "SELECT MAX(id) AS max_id FROM topics";
    $stmt = $db->prepare($msql);
    $stmt->execute();
    $result = $stmt->get_result(); // Получить набор результатов

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $max_id = $row['max_id']; // Извлечь значение 'max_id'
            break; // Предполагая, что ожидается только одна строка
        }
    } else {
        // Обработать сценарий отсутствия строк
    }

    // Generate a new ID based on the maximum ID
    $new_id = $max_id + 1;

    if (isset($_POST)) {

        // Загрузить изображение
        $image = $_FILES['create_img'];
      
        // Проверка типа изображения
        if ($image['type'] != 'image/jpeg' && $image['type'] != 'image/png') {
            echo 'Неверный тип изображения.';
            header("Location: index.php");
            exit;
        }
      
        // Прочитать содержимое изображения
        $imageData = file_get_contents($image['tmp_name']);
      
        // Конвертировать содержимое изображения в бинарный формат
        $hexData = bin2hex($imageData);
      

        // Подготовка и выполнение SQL-запроса для сохранения изображения в виде `longblob`
        $sql = "INSERT INTO topics (id, user_id, title, description, image) VALUES ('$new_id', '$user_id', '$create_title', '$create_text', 0x{$hexData})";
        $stmt = $db->prepare($sql);

        $stmt->execute();

        $stmt->close();
    }

    header("Location: index.php");
    exit();
}

$db_connection = new db_connect();
$db = $db_connection->connect();

create_topic($db);
?>