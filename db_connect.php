<?php
class db_connect {
    private $host = 'localhost';
    private $username = 'Hod';
    private $password = '1111';
    private $database = 'forum';

    public function connect() {
        $link = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$link) {
            die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
        }
        return $link;
    }
}
