<?php
//session_start();
include("../../path.php");
include "../../app/controllers/topics.php";
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
        <a href="create.php" class="btn btn-secondary col-3">Создать категорию</a>
        <a href="index.php" class="btn btn-secondary col-2">Управление категориями</a>
      </div>
      <div class="row title-table">
        <h2>Редактирование категории</h2>
      </div>
      <?php include "../../app/include/errorInfo.php" ?>

      <div class="row add-post">
        <form action="edit.php" method="post">
          <input name="id" value="<?=$id;?>" type="hidden">
          <div class="col">
            <input name="name" value="<?=$name;?>" type="text" class="form-control form-control-lg is-invalid" id="floatingInputInvalid" placeholder="Заголовок">
          </div>
          <div class="form-floating">
            <textarea name="notice" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"><?=$notice;?></textarea>
            <label for="floatingTextarea">О категории</label>
          </div>

          <div class="col-auto">
            <button name="topics-edit" type="submit" class="btn btn-primary mb-3">Обновить</button>
          </div>

        </form>
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