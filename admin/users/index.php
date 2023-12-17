<?php
session_start();
include("../../path.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../../css/admin.css" />

  <title>Document</title>
</head>

<body>

  <?php
  include('../../app/include/headerAdmin.php');
  ?>

  <div class="container">
    <?php include("../../app/include/sidebarAdmin.php"); ?>
    <div class="posts col-8">
      <div class="button row">
        <a href="create.php" class="btn btn-secondary col-3">Добавить</a>
        <a href="index.php" class="btn btn-secondary col-2">Управление</a>
      </div>
      <div class="row title-table">
        <h2>Панель постов</h2>
        <div class="id col-1">
          Id
        </div>
        <div class="title col-4">
          Логин
        </div>
        <div class="author col-3">
          Права
        </div>
        <div class="edit col-2">
          Редактировать
        </div>
        <div class="delete col-2">
          Удалить
        </div>
      </div>

      <div class="row">
        <div class="id col-1">
          1
        </div>
        <div class="title col-4">
          Monk
        </div>
        <div class="author col-3">
          Author
        </div>
        <div class="edit col-2">
          Edit
        </div>
        <div class="delete col-2">
          Delete
        </div>
      </div>

      <div class="row">
        <div class="id col-1">
          2
        </div>
        <div class="title col-4">
          Nik
        </div>
        <div class="author col-3">
          Author
        </div>
        <div class="edit col-2">
          Edit
        </div>
        <div class="delete col-2">
          Delete
        </div>
      </div>

      <div class="row">
        <div class="id col-1">
          3
        </div>
        <div class="title col-4">
          Nil
        </div>
        <div class="author col-3">
          Author
        </div>
        <div class="edit col-2">
          Edit
        </div>
        <div class="delete col-2">
          Delete
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Начало нижней панели -->
  <?php
  include('../../app/include/footer.php');
  ?>
  <!-- Конец нижней панели -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>