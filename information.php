<?php
include("path.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

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
          <h3>Мы молодые разработчики написавшие социальную сеть в 2077 году</h3>
          <div class="news row">
            <div class="img col-12">
              <img src="img/Lilypad.jpeg" alt="..." />
            </div>
            <div class="news_text col-12">
              <p class="introduction">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda ad ea doloremque
                cupiditate adipisci sed deserunt corporis officia nihil perspiciatis sint natus
                eveniet voluptas, eaque a, fugit laborum obcaecati in.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Конец среднего блока -->

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
      integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
