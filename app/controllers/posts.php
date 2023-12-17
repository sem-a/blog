<?php

include "../../app/database/db.php";

$err_arr = [];
$id = '';
$title = '';
$content = '';
$topic = '';

$submit = true;

$topics = ALLselect('categories');
$posts = ALLselect('posts');
$postAdmin = ALLselectPostUsers('posts', 'users');

// код для создания поста

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {

  if(!empty($_FILES['path_img']['name'])) {
    $imgname = time() . "-" . $_FILES['path_img']['name'];
    $tmpfile = $_FILES['path_img']['tmp_name'];
    $path = ROOT_PATH . "\img\posts\\" . $imgname;
    $filetype = $_FILES['path_img']['type'];

    if(strpos($filetype, 'image') === false) {
      array_push($err_arr, "Можно загружать только изображения");
      $submit = false;
    }

    $result = move_uploaded_file($tmpfile, $path);

    if($result) {
      $_POST['path_img'] = $imgname;
    } else {
      array_push($err_arr, "Картинка не загрузилась");
      $submit = false;
    }
  } else {
    array_push($err_arr, "Ошибка получения картинки");
    $submit = false;
  }

  $title = trim($_POST['title']);
  $content = trim($_POST['content']);
  $topic = trim($_POST['topic']);
  $publish = isset($_POST['publish']) ? 1 : 0;

  if($title === '' || $content === '' || $topic === '') {
    array_push($err_arr, "Не все поля заполнены");
    $submit = false;
  }
  if(mb_strlen($title, $encoding='UTF8') < 5) {
    array_push($err_arr,'Название очень короткое');
    $submit = false;
  }
  if($submit){

    $check = ONEselect('posts', ['title' => $title]);
    if(!empty($check['title']) && $check['title'] === $title) {
      array_push($err_arr, 'Пост с таким названием уже существует');
    } else {

      $post = [
        'id_user' => $_SESSION['id'],
        'title' => $title,
        'content' => $content,
        'path_img' => $_POST['path_img'],
        'published' => $publish,
        'id_topic' => $topic,
      ];

      $id = insert('posts', $post);
      
      $topic = ONEselect('posts', ['id' => $id]);

      header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
  }
} else {
  $id = '';
  $title = '';
  $content = '';
  $publish = '';
  $topic = '';
}

// код для редактирования записи

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

  $id = $_GET['id'];
  $post = ONEselect('posts', ['id' => $id]);
  $id = $post['id'];
  $name = $post['title'];
  $content = $post['content'];
  $topic = $post['id_topic'];
  $publish = $post['published'];

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {

  $id = $_POST['id'];
  $title = trim($_POST['title']);
  $content = trim($_POST['content']);
  $topic = trim($_POST['topic']);
  $publish = isset($_POST['publish']) ? 1 : 0;

  if(!empty($_FILES['path_img']['name'])) {
    $imgname = time() . "-" . $_FILES['path_img']['name'];
    $tmpfile = $_FILES['path_img']['tmp_name'];
    $path = ROOT_PATH . "\img\posts\\" . $imgname;
    $filetype = $_FILES['path_img']['type'];

    if(strpos($filetype, 'image') === false) {
      array_push($err_arr, "Можно загружать только изображения");
      $submit = false;
    }

    $result = move_uploaded_file($tmpfile, $path);

    if($result) {
      $_POST['path_img'] = $imgname;
    } else {
      array_push($err_arr, "Картинка не загрузилась");
      $submit = false;
    }
  }

  if(mb_strlen($title, $encoding='UTF8') < 3 && mb_strlen($title, $encoding='UTF8') > 0) {
    array_push($err_arr,'Категория очень короткая');
    $submit = false;
  }
  if($submit){

    $post = [
      'id_user' => $_SESSION['id'],
      'title' => $title,
      'content' => $content,
      'path_img' => $_POST['path_img'],
      'published' => $publish,
      'id_topic' => $topic,
    ];
      
    $post = update('posts', $id, $post);

    header('location: ' . BASE_URL . 'admin/posts/index.php');
  }
} else {
  $title = '';
  $content = '';
  $publish = isset($_POST['publish']) ? 1 : 0;
  $topic = '';
}

// удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {

  $id = $_GET['del_id'];

  delete('posts', $id);
  header('location: ' . BASE_URL . 'admin/posts/index.php');

}

// обновление / сняти публикации

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {

  $id = $_GET['pub_id'];
  $publish = $_GET['publish'];

  $postUP = update('posts', $id, ['published' => $publish]);
  header('location: ' . BASE_URL . 'admin/posts/index.php');

  exit();
}
?>