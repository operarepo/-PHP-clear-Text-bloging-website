<!DOCTYPE html>
<html lang="ru">
<head>
<?php require 'blocks/head.php'; ?>
<title>Main page</title>
    <?php
        require_once 'sql_connection.php';
        $sql = 'SELECT * FROM `articles` WHERE `id` = :id';
        $query = $pdo->prepare($sql);
        $query->execute(['id' => $_GET['id']]);
        $row = $query->fetch(PDO::FETCH_OBJ);
    ?>
</head>
<body>
<?php require 'blocks/header.php'; ?>
<main class="container mt-8">
    <div class="row">
    <div class="col-md-8 mb-5 mt-5">
        <div class="jumbotron">
            <h1 class="mb-5 text-center"><?=$row->title?></h1><p><b><em>Автор статьи: 
            </b><?=$row->author?></em></p><p><b><em>Дата публикации: 
            </b><?php require_once 'blocks/publish_date.php'; echo $date; ?></em></p>
            <p><?=$row->intro?><br><br><?=$row->text?></p><br>
        </div>
    </div>
    <?php 
        require('blocks/aside.php');
    ?>
    </div>

</main>
<?php require 'blocks/footer.php'; ?>

</body>
</html>