<?php
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $inro = trim(filter_var($_POST['inro'], FILTER_SANITIZE_EMAIL));
    $text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));
    
    $error = '';

    if(strlen($title) <= 3) {
        $error = 'Введите Заголовок';
    } else if(strlen($inro) <= 3) {
        $error = 'Введите Интро';
    } else if(strlen($text) <= 3) {
        $error = 'Введите Текст';
    }
    if($error != "") {
        echo $error;
        exit();
    }

    // $hash = "asdraegeth5345ygtrg34g32rgwerwg";
    // $pass = md5($password .$hash);
    $db = 'articles';
    require_once '../sql_connection.php';
    $sql = 'INSERT INTO blog_db_user(title, inro, email) VALUES (?, ?, ?)';
    $query = $pdo->prepare($sql);
    try {
        $query->execute([$username, $login, $text, $pass, $age]);
    echo 'Вы зарегистрированы на нашем сайте!';
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }


?>
