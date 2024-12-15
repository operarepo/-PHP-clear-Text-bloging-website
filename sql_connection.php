<?php
    $user = 'root';
    $par = '';
    $host = 'localhost';
    $db = 'blogbd';
    $dsn = 'mysql:host=' .$host. ';dbname=' .$db;
    $pdo = new PDO($dsn, $user, $par);
?>