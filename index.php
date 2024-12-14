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
      <div class="col-md-8 mb-2">
      Основная часть сайта
      </div>
      <?php require 'blocks/aside.php'; ?>
    </div>

</main>
<?php require 'blocks/footer.php'; ?>

</body>
</html>