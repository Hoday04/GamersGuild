<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Gamer's Guild</title>
</head>
<header>
    <div id="buttons">
        <a class="logo_a_main" href="index.php"><img src="ggg_logo.png" alt="logo" id="logo"></a><a href="index.php" class="name_a_main"><span id="logo_name">Gamers Guild</span></a>
        <a href="news.php" id="a_button">Новости</a>
        <a href="topics.php" id="a_button">Темы</a>
        <a href="rules.php" id="a_button">Правила</a>
        <a href="contacts.php" id="a_button">Контакты</a>
        <a href="" id="create_top" class="login">Создать тему</a>
        <a href="" id="login" class="login">Вход</a>
        <a href="" id="reg" class="login">Регистрация</a>
    
        <div id="modal" class="modal">
            <div class="modal-content">
              <span class="close" id="login_close">&times;</span>
              <h2>Авторизация</h2>
              <form id="loginForm" action="login.php" method="post">
                <label for="username" id="login_input">Логин:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password" id="password_input">Пароль:</label>
                <input type="password" id="password" name="password" required>
                
                <button id="loginButton" type="submit" class="login">Войти</button>
              </form>
            </div>
          </div>

          <div id="registerModal" class="modal">
            <div class="modal-content">
              <span class="close" id="reg_close">&times;</span>
              <h2>Регистрация</h2>
              <form id="registerForm" action="registration.php" method="post">
                <label for="registerUsername" class="name_input">Логин:</label>
                <input type="text" id="registerUsername" name="registerUsername" required>
                
                <label for="registerPassword" class="name_input">Пароль:</label>
                <input type="password" id="registerPassword" name="registerPassword" required>
                
                <label for="email" class="name_input">Почта:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="firstName" class="name_input">Имя:</label>
                <input type="text" id="firstName" name="firstName" required>
                
                <label for="middleName" class="name_input">Отчество:</label>
                <input type="text" id="middleName" name="middleName" required>
                
                <label for="lastName" class="name_input">Фамилия:</label>
                <input type="text" id="lastName" name="lastName" required>
                
                <button type="submit" id="registerButton" class="login">Зарегистрироваться</button>
              </form>
            </div>
          </div>

          <div id="create_modal" class="modal">
            <div class="modal-content">
              <span class="close" id="create_close">&times;</span>
              <h2>Создание темы</h2>
              <form id="create_form" action="add_topic.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <p id="create_p">Заголовок:</p>
                  <input type="text" id="create_title" name="create_title" required>
                  <p id="create_p">Заставка:</p>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="create_img" required>
                  <p id="create_p">Текст:</p>
                  <textarea name="create_text" id="create_text" cols="30" rows="5" name="create_text" required></textarea>
                  <button type="submit" id="createButton" class="login">Создать</button>
              </div>
              </form>
            </div>
          </div>

    </div>
</header>
<body>
    <div id="main">
        <h3 id="contacts_title">Контакты</h3>

            <h5 id="contacts_number">Если у вас есть вопросы, предложения или жалобы, вы можете связаться с нами следующими способами:</h5>
            
            <p id="contacts_text">Электронная почта: support@игровойфорум.com</p>
            <p id="contacts_text">Телефон: +375 29 456-78-90</p>
            <p id="contacts_text">Социальные сети:</p>
            <p id="contacts_text" style="margin-left: 15%;">- Вконтакте: @игровойфорум</p>
            <p id="contacts_text" style="margin-left: 15%;">- Twitter: @игровойфорум</p>
            
            <p id="contacts_text">Часы работы службы поддержки:</p>
            <p id="contacts_text" style="margin-left: 15%;">Понедельник - Пятница: с 9:00 до 18:00 (по московскому времени)</p>
            <p id="contacts_text" style="margin-left: 15%;">Суббота - Воскресенье: выходные дни</p>
            
            <h5 id="contacts_number">Мы постараемся ответить на ваше обращение в кратчайшие сроки. Спасибо за понимание!</h5>
    </div>
    <script src="script.js"></script>
</body>
<footer>

</footer>
</html>