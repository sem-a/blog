<?php
//session_start();
include("../../path.php");
include("../../app/controllers/posts.php");
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
        <a href="create.php" class="btn btn-secondary col-3">Добавить пост</a>
        <a href="index.php" class="btn btn-secondary col-2">Управление постами</a>
      </div>
      <div class="row title-table">
        <h2>Добавление поста</h2>
      </div>

      <?php include "../../app/include/errorInfo.php" ?>

      <div class="row add-post">
        <form action="create.php" method="post" enctype="multipart/form-data">
          <div class="col">
            <input name="title" value="<?=$title?>" class="form-control form-control-lg" id="floatingInputInvalid" placeholder="Заголовок">
          </div>
          <div class="form-floating">
            <textarea name="content" value="<?=$content?> class="form-control" placeholder="Leave a comment here" id="editor" style="height: 100px;"></textarea>
          </div>
          <div class="input-group mb-3">
            <input type="file" name="path_img" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>

          <select name="topic" class="form-select" aria-label="Default select example">
            <option selected>Выберите категорию</option>
            <?php foreach($topics as $key => $topic): ?>
            <option value="<?=$topic['id']?>"><?=$topic['name']?></option>
            <?php endforeach; ?>
          
          </select>

          <div class="col-auto">
            <input type="checkbox" id="publish" name="publish" value="1">
            <label for="publish">Подтверди для публикации</label>
          </div>

          <div class="col-auto">
            <button name="add_post" type="submit" class="btn btn-primary mb-3">Опубликовать</button>
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
  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
  <script src="../../js/script.js"></script>
</body>

</html>