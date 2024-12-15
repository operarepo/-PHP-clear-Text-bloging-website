<?php
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $error = '';

    if(strlen($login) <= 3) {
        $error = 'Введите Логин';
    } else if(strlen($password) <= 3) {
        $error = 'Введите Пароль';
    }
    if($error != "") {
        echo $error;
        exit();
    }

    $hash = "asdraegeth5345ygtrg34g32rgwerwg";
    $pass = md5($password .$hash);
    $db = 'blogbd';
    require_once '../sql_connection.php';
    $sql = 'SELECT `id` FROM `blog_db_user` WHERE `login` = :login AND `password` = :pass';
    $query = $pdo->prepare($sql);
    try {
        $query->execute([':login' => $login, ':pass' => $pass]);
        $user = $query -> fetch(PDO::FETCH_OBJ);
        if ($user) { // Проверяем, найден ли пользователь
            setcookie('log', $login, time() + 3600 * 24 * 30, "/");
            echo 'Вы авторизованы на нашем сайте!';
        } else {
            echo 'Пользователь не найден!';
        }
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }
?>