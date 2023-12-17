<?php
include("path.php");
include("./app/database/db.php");
error_reporting(0);
include("./app/controllers/topics.php");

$posts = ALLselect('posts', ['id_topic' => $_GET['id']]);
$category = ONEselect('categories', ['id' => $_GET['id']]);

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

  <title>Document</title>
</head>

<body>

  <?php
  include('app/include/header.php');
  ?>

  <!-- Средний блок главной страницы -->

  <div class="container">
    <div class="content row">

      <div class="main-content col-sm-8">
        <h3>Раздел <?=$category['name'];?></h3>

        <?php foreach ($posts as $post) : ?>

          <div class="news row">
            <div class="img col-12 col-sm-4">
              <img src="<?= BASE_URL . 'img/posts/' . $post['path_img'] ?>" alt="<?= $post['title'] ?>" class="img-thumbnail" />
            </div>
            <div class="news_text col-12 col-sm-8">
              <h3>
                <a href="<?= BASE_URL . 'one.php?post=' . $post['id']; ?>"><?= substr($post['title'], 0, 100) . '...' ?></a>
              </h3>
              <i class="las la-user-circle"><?= $post['user_name']; ?></i>
              <i class="las la-calendar-week"><?= $post['created']; ?></i>
              <p class="introduction">
                <?= substr($post['content'], 0, 170) . '...' ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- Боковая информация -->
      <div class="sidebar col-12 col-md-4">
        <div class="par search">
          <h3>Исследование материалов</h3>
          <form action="/" method="post">
            <input type="text" name="search-tern" class="text-input" placeholder="Введите пост, который вас интересует">
          </form>
        </div>
        <div class="par top">
          <h3>Разделы</h3>
          <ul>
            <?php
            foreach ($topics as $key => $topic) :
            ?>
              <li><a href="<?= BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?= $topic['name']; ?></a></li>

            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <!-- Конец боковой информации -->
    </div>
  </div>

  <!-- Конец среднего блока -->

  <!-- Начало нижней панели -->
  <?php
  include('app/include/footer.php');
  ?>
  <!-- Конец нижней панели -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>