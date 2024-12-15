<!DOCTYPE html>
<html lang="ru">
<head>
<?php require 'blocks/head.php'; ?>
<title>Main page</title>
</head>
<body>
<?php require 'blocks/header.php'; ?>
  <main class="container mt-8">
    <div class="row">
      <div class="col-md-8 mb-1 mt-3">
        <?php
        if (isset($_COOKIE['user_login']) && $_COOKIE['user_login'] != ''):
        ?>
        <?php
          require_once 'sql_connection.php';
          $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
          $query = $pdo->query($sql);
          
          while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            require_once 'blocks/publish_date.php';
            echo "<h2>$row->title</h2><br>" . "<p>$row->intro</p><br>" . "<p class='mb-3'><b>Автор статьи: </b>$row->author</p><p class='mb-3'><b>Дата публикации: </b>$date</p>
            <a href='news.php?id=$row->id' title='$row->title>'
            <h6><button class='btn btn-warning mb-3'>Протичать статью</button></h6></a>";
          }
        ?>
        <?php
        else:
        ?>
        <h6> Чтобы начать просмотр обпубликованных статей необходимо войти в аккаунт или зарегистрироваться</h6>
        <?php
        endif;
        ?>
      </div>
      <?php 
        require('blocks/aside.php');
      ?>

      </div>

</main>
<?php require 'blocks/footer.php'; ?>

</body>
</html>