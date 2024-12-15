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
      <div class="col-md-8 mb-5 mt-5">
        <?php
          require_once 'sql_connection.php';
          $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
          $query = $pdo->query($sql);
          while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo "<h2>$row->title</h2><br>" . "<p>$row->intro</p><br>" . "<p><b>Автор статьи: </b><mark>$row->author</mark></p>";
            echo "<h6><button class='btn btn-warning mb-3'>Протичать статью</button></h6>";
          }
        ?>
      </div>
      <?php require 'blocks/aside.php'; ?>
    </div>

</main>
<?php require 'blocks/footer.php'; ?>

</body>
</html>