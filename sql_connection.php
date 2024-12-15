<?php
    $user = 'root';
    $par = '';
    $host = 'localhost';

    $dsn = 'mysql:host=' .$host. ';dbname=' .$db;
    $pdo = new PDO($dsn, $user, $par);
?>