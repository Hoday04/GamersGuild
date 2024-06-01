<?php
require_once('db_connect.php');

function register($db) {
  // Get user data from the form
  $username = $_POST['registerUsername'];
  $password = $_POST['registerPassword'];
  $email = $_POST['email'];
  $firstName = $_POST['firstName'];
  $middleName = $_POST['middleName'];
  $lastName = $_POST['lastName'];

  // Get the maximum ID value
  $msql = "SELECT MAX(id) AS max_id FROM users";
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

  // Create a prepared statement to prevent SQL injection
  $sql = "INSERT INTO users(id,login, password, email, name, patronymic, surname) VALUES ($new_id,'$username','$password','$email','$firstName','$middleName','$lastName')";
  $stmt = $db->prepare($sql);

  // Execute the prepared statement
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo json_encode(array('status' => 'YES', 'is_user' => 'user'));
    header("Location: index.php");
    echo '<script>Вы зарегистрированы</script>';
    session_start();
    $_SESSION['user_id'] = $new_id;
    exit(); // Use single quotes and 'true' for JS boolean
  } else {
    echo json_encode(array('status' => 'NO', 'is_user' => 'none')); // Use single quotes and 'false' for JS boolean
  }

  $stmt->close(); // Close the prepared statement
}

$db_connection = new db_connect();
$db = $db_connection->connect();

register($db); // Call the register function
