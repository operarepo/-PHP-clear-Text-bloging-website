<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require 'blocks/head.php'; ?>
    <title>Авторизация</title>
</head>
<body>
    <?php require 'blocks/header.php'; ?>
    <main class="container mt-5"> <!-- Изменил mt-8 на mt-5 для лучшего отображения -->
        <div class="row">
            <div class="col-md-9 mt-3 mx-auto"> <!-- Добавил mx-auto для центрирования колонки -->
                <?php
                    if (!isset($_COOKIE['user_login']) || $_COOKIE['user_login'] == ''):
                ?>
                <h3 class="text-center">Авторизация</h3>
                <form action="" method="post" class="w-100"> <!-- Установил ширину формы на 100% -->
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="text" name="login" id="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="alert alert-danger mt-2" id="errorBlock" style="display: none;"></div> <!-- Скрываем блок ошибок по умолчанию -->
                    <button type="button" id="auth_user" class="btn btn-success mt-2">Войти</button>
                </form>
                <?php
                else:
                ?>
                <h2><?=$_COOKIE['user_login']?></h2>
                <button class="btn btn-danger" id="exit_btn">Выйти</button>
                <?php
                endif;
                ?>
            </div>
            <?php require 'blocks/aside.php'; ?> <!-- Аside для блока спарва, не забыть поменять местами и перевести регистрацию и вход налево как в ВК -->
        </div>
    </main>
    <?php require 'blocks/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('#auth_user').click(function () {
            var login = $('#login').val();
            var password = $('#password').val();

            $.ajax({
                url: 'ajax_engine/auth.php',
                type: 'POST',
                cache: false, 
                data: {'login': login, 'password': password},
                dataType: 'html',
                success:function (data) {
                    console.log(data);
                    if(data == "Вы авторизованы на нашем сайте!") {
                        $('#auth_user').text('Успешно!');
                        $('#errorBlock').hide();
                        document.location.reload(true);
                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);
                    }
                }
            });
        });
        $('#exit_btn').click(function () {
            $.ajax({
                url: 'ajax_engine/exit.php',
                type: 'POST',
                cache: false, 
                data: {},
                dataType: 'html',
                success:function (data) {                    
                    document.location.reload(true);
                }
            });
        });
        
    </script>
</body>
</html>
<!-- Вылезает текстом ошибка перед логином пользователя -->