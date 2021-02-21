<?php
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        //echo nl2br("database connected\n");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>