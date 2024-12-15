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
        <h3 class="mt-2">Оставить коментарий: </h3>
        <form action="" method="post" class="w-100">
                    <div class="form-group">
                        <label for="comment">Введите коментарий</label>
                        <textarea type="text" name="comment" id="comment" class="form-control"><?php echo 'Коментарий от ' . $_COOKIE['user_login'] . ':'?></textarea>
                    </div>
                    <div class="alert alert-danger mt-2" id="errorBlock" style="display: none;"></div>
                    <button id="comment_art" class="btn btn-success mt-2">Отправить</button>
                </form>
    </div>
    <?php 
        require('blocks/aside.php');
    ?>
    </div>

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('#comment_art').click(function () {
            var comment = $('#comment').val();
            $.ajax({
                url: 'ajax_engine/coments.php',
                type: 'POST',
                cache: false, 
                data: {'comment':  comment},
                dataType: 'html',
                success:function (data) {
                    if(data == "Опубликовано! ") {
                        $('#comment').text('Успешно!');
                        $('#errorBlock').hide();
                        document.location.reload(true);
                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);
                    }
                }
            });
        });
    </script>
<?php require 'blocks/footer.php'; ?>

</body>
</html>