<?php
require '../sql_connection.php';
$author = $_COOKIE['log'];
echo gettype($author);
echo $author;
// Убедитесь, что соединение с базой данных устанавливается с правильной кодировкой
$pdo = new PDO('mysql:host=localhost;dbname=blogbd;charset=utf8mb4', 'root', '');

// Получение данных из POST
$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
$text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));
$error = '';

// Проверка длины введенных данных
if (strlen($title) <= 3) {
    $error = 'Введите Заголовок';
} else if (strlen($intro) <= 3) {
    $error = 'Введите Интро';
} else if (strlen($text) <= 3) {
    $error = 'Введите Текст';
}

if ($error != "") {
    echo $error;
    exit();
}

// Проверка наличия куки

// var_dump($author); // Вывод значения куки для отладки
// echo $author;
// sleep(10);

$sql = 'INSERT INTO articles(title, intro, text, date, author) VALUES (?, ?, ?, ?, ?)';
$query = $pdo->prepare($sql);

try {
    $query->execute([$title, $intro, $text, time(), $author]);
    echo 'Вы зарегистрированы на нашем сайте!';
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>