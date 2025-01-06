<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require 'blocks/head.php'; ?>
    <title>Регистрация</title>
</head>
<body>
    <?php require 'blocks/header.php'; ?>
    <main class="container mt-5"> <!-- Изменил mt-8 на mt-5 для лучшего отображения -->
        <div class="row">
            <div class="col-md-9 mt-3 mx-auto"> <!-- Добавил mx-auto для центрирования колонки -->
                <h3 class="text-center">Регистрация</h3>
                <form action="" method="post" class="w-100"> <!-- Установил ширину формы на 100% -->
                    <div class="form-group">
                        <label for="username">Введите имя</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="text" name="login" id="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="age">Возраст</label>
                        <input type="text" name="age" id="age" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="alert alert-danger mt-2" id="errorBlock" style="display: none;"></div> <!-- Скрываем блок ошибок по умолчанию -->

                    <button type="button" id="reg_user" class="btn btn-success mt-2">Зарегистриоваться</button>
                </form>
            </div>
    <?php 
        require('blocks/aside.php');
    ?> <!-- Убедитесь, что aside правильно расположен -->
        </div>
    </main>
    <?php require 'blocks/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('#reg_user').click(function () {
            var name = $('#username').val();
            var email = $('#email').val();
            var login = $('#login').val();
            var age = $('#age').val();
            var password = $('#password').val();
            $.ajax({
                url: 'ajax_engine/reg.php',
                type: 'POST',
                cache: false, 
                data: {'username': name, 'email': email, 'login': login, 'age': age, 'password': password},
                dataType: 'html',
                success:function (data) {
                    if(data == "Вы зарегистрированы на нашем сайте!") {
                        $('#reg_user').text('Успешно!');
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