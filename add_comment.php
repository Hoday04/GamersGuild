<?php
require_once('db_connect.php');

function create_comment($db) {
    $input_comment = $_POST['input_comment'];
    $user_id = 0;
    $topic_id = 0;
    $topic_id = intval($_POST['topic_id']);
    // Начало сессии
    session_start();

    // Проверка наличия значения 'user_id' в сессии
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        echo '<script>alert("Вы не авторизованы.");</script>';
        header("Location: topic_page.php");
        exit();
    }
    // Get the maximum ID value
    $msql = "SELECT MAX(id) AS max_id FROM comments";
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

      

        // Подготовка и выполнение SQL-запроса для сохранения изображения в виде `longblob`
        $sql = "INSERT INTO comments (id, user_id, topic_id, text) VALUES ('$new_id', '$user_id', '$topic_id', '$input_comment')";
        $stmt = $db->prepare($sql);

        $stmt->execute();

        $stmt->close();
    }

    header("Location: topic_page.html");
    exit();
}

$db_connection = new db_connect();
$db = $db_connection->connect();

create_comment($db);
?>