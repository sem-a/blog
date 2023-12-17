<?php

include "../../app/database/db.php";

$err_arr = [];
$id = '';
$name = '';
$notice = '';
$submit = true;

$topics = ALLselect('categories');

// код для создания категории 

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topics-create'])) {

  $name = trim($_POST['name']);
  $notice = trim($_POST['notice']);

  if($name === '' || $notice === '') {
    array_push($err_arr, "Не все поля заполнены");
    $submit = false;
  }
  if(mb_strlen($name, $encoding='UTF8') < 3) {
    array_push($err_arr,'Категория очень короткая');
    $submit = false;
  }
  if($submit){

    $check = ONEselect('categories', ['name' => $email]);
    if(!empty($check['name']) && $check['name'] === $name) {
      array_push($err_arr, 'Категория уже существует');
    } else {

      $topic = [
        'name' => $name,
        'notice' => $notice,
      ];

      $id = insert('categories', $topic);
      
      $topic = ONEselect('categories', ['id' => $id]);

      header('location: ' . BASE_URL . 'admin/topics/index.php');
    }
  }
} else {
  $name = '';
  $notice = '';
}

// код для редактирования категорий

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

  $id = $_GET['id'];
  $topic = ONEselect('categories', ['id' => $id]);
  $id = $topic['id'];
  $name = $topic['name'];
  $notice = $topic['notice'];

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topics-edit'])) {


  $name = trim($_POST['name']);
  $notice = trim($_POST['notice']);

  if($name === '' || $notice === '') {
    array_push($err_arr, "Не все поля заполнены");
    $submit = false;
  }
  if(mb_strlen($name, $encoding='UTF8') < 3) {
    array_push($err_arr,'Категория очень короткая');
    $submit = false;
  }
  if($submit){

    $topic = [
      'name' => $name,
      'notice' => $notice,
    ];

    $id = $_POST['id'];
      
    $topic_id = update('categories', $id, $topic);

    header('location: ' . BASE_URL . 'admin/topics/index.php');
  }
}

// удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {

  $id = $_GET['del_id'];

  delete('categories', $id);
  header('location: ' . BASE_URL . 'admin/topics/index.php');

}

?>