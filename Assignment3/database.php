<?php

$dsn='mysql:host=localhost;dbname=todolist';
$username='root';
$password='';
$db = new PDO($dsn, $username, $password);

try {
    $db = new PDO($dsn, $username, $password);
    //echo "<p> you are connected to the database!s </p>";
} catch (PDOException $e) {
   $error_message = $e->getMessage();
   echo "<p> Error message: $error_message </p>";
}




