<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $age = trim(filter_var($_POST['age'], FILTER_VALIDATE_INT));

    $error = '';

    if(strlen($username) <= 3) {
        $error = 'Введите Имя';
    } else if(strlen($email) <= 3) {
        $error = 'Введите E-mail';
    } else if(strlen($login) <= 3) {
        $error = 'Введите Логин';
    } else if(strlen($password) <= 3) {
        $error = 'Введите Пароль';
    } else if($age == false) {
        $error = 'Возраст должен быть числом!';
    }
    if($error != "") {
        echo $error;
        exit();
    }

    $hash = "asdraegeth5345ygtrg34g32rgwerwg";
    $pass = md5($password .$hash);

    require_once '../sql_connection.php';
    $sql = 'INSERT INTO blog_db_user(username, login, email, password, age) VALUES (?, ?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    try {
        $query->execute([$username, $login, $email, $pass, $age]);
    echo 'Вы зарегистрированы на нашем сайте!';
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }


?>
