<?php
include("path.php");
include("./app/controllers/users.php");
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

  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/one.css" />

  <title>Document</title>
</head>

<body>
  <?php
  include('app/include/header.php');
  ?>

  <!-- Начало формы -->

  <div class="container">
    <form class="reg" method="post" action="auth.php">
      <h3>Авторизация</h3>

      <div class="mb-3">
      <?php include "./app/include/errorInfo.php" ?>
        <label for="exampleInputEmail1" class="form-label">Почта</label>
        <input type="email" name="email" value="<?= $email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
        <div id="emailHelp" class="form-text">
          Мы никогда никому не передадим вашу электронную почту
        </div>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
      </div>

      <button type="submit" name="button-log" class="btn btn-primary">Войти</button>

      <a href="reg.php">Зарегистрироваться</a>
      <div class="form-text1">Если еще нет аккаунта</div>
    </form>
  </div>
</body>

</html>