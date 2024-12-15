<?php
    if(!isset($_COOKIE['user_login']) || $_COOKIE['user_login'] == '') {
        header('Location: /reg.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require 'blocks/head.php'; ?>
    <title>Добавление статьи</title>
</head>
<body>
    <?php require 'blocks/header.php'; ?>
    <main class="container mt-5"> <!-- Изменил mt-8 на mt-5 для лучшего отображения -->
        <div class="row">
            <div class="col-md-8 mt-3 mx-auto"> <!-- Добавил mx-auto для центрирования колонки -->
                <h3 class="text-center">Добавление статьи</h3>
                <form action="" method="post" class="w-100"> <!-- Установил ширину формы на 100% -->
                    <div class="form-group">
                        <label for="title">Заголовок статьи</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="text-intro">Интро текста</label>
                        <textarea name="intro" id="intro" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text">Текст</label>
                        <textarea name="text" id="text" class="form-control"></textarea>
                    </div>
                    <div class="alert alert-danger mt-2" id="errorBlock" style="display: none;"></div> <!-- Скрываем блок ошибок по умолчанию -->
                    <button type="button" id="article_send" class="btn btn-success mt-2">Добавить</button>
                </form>
            </div>
            <?php require 'blocks/aside.php'; ?> <!-- Убедитесь, что aside правильно расположен -->
        </div>
    </main>
    <?php require 'blocks/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('#article_send').click(function () {
            var title = $('#title').val();
            var intro = $('#intro').val();
            var text = $('#text').val();
            $.ajax({
                url: 'ajax_engine/add_article.php',
                type: 'POST',
                cache: false, 
                data: {'title': title, 'intro': intro, 'text': text},
                dataType: 'html',
                success:function (data) {
                    if(data == "Вы зарегистрированы на нашем сайте!") {
                        $('#article_send').text('Успешно!');
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
</body>
</html>