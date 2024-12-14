<?php
    $user = 'root';
    $par = '';
    $db = 'blogbd';
    $host = 'localhost';

    $dsn = 'mysql:host=' .$host. ';dbname=' .$db;
    $pdo = new PDO($dsn, $user, $par);
?>