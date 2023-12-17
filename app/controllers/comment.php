<?php 

$page = $_GET['post'];

$email = '';
$comment = '';
$err_arr = [];
$submit = true;
$comments = [];

// код для создания коммента

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['click_comment'])) {

  $email = trim($_POST['email']);
  $comment = trim($_POST['comment']);

  if($email === '' || $comment === '') {
    array_push($err_arr, "Не все поля заполнены");
    $submit = false;
  }
  if(mb_strlen($comment, $encoding='UTF8') < 5) {
    array_push($err_arr,'Комментарий очень короткие');
    $submit = false;
  }
  if($submit){

    $comment = [
      'status' => $status,
      'page' => $page,
      'email' => $email,
      'comment' => $comment,
    ];
    $comment = insert('comments', $comment);
    $comments = ALLSelect('comments', ['page' => $page, 'status' => 1]);
    
  }
} else {
  $email = '';
  $comment = '';
  $comments = ALLSelect('comments', ['page' => $page, 'status' => 1]);
}

?>