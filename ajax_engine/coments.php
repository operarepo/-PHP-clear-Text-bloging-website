<?php
    $coment = trim(filter_var($_POST['comment'], FILTER_SANITIZE_STRING));

    $error = '';

    if(strlen($coment) <= 3) {
        $error = 'Введите сообщение:';
    }
    if($error != "") {
        echo $error;
        exit();
    }
    if (empty($_COOKIE['user_login'])) {
        echo 'Ошибка: пользователь не авторизован.';
        exit();
    }
    $db = 'blogbd';
    require_once '../sql_connection.php';
    $sql = 'INSERT INTO coment_from_users(login, coment, date) VALUES (?, ?, ?)';
    $query = $pdo->prepare($sql);
    try {
        $query->execute([$_COOKIE['user_login'], $coment, time()]);
    echo 'Опубликовано! ';
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }
?>