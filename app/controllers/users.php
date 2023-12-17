<?php
include('app/database/db.php');

function userAuth($user) {
  $_SESSION['id'] = $user['id'];
  $_SESSION['login'] = $user['user_name'];
  $_SESSION['admin'] = $user['admin'];

  if($_SESSION['admin']) {
    header('location: ' . BASE_URL . 'admin/posts/index.php');
  } else {
    header('location: ' . BASE_URL);
  }
}

$err_arr = []; // массив ошибок
$submit = true;
// код для регистрации 

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
  $admin = 0;
  $login = trim($_POST['login']);
  $email = trim($_POST['email']);
  $age = trim($_POST['age']);
  $passF = trim($_POST['pass-first']);
  $passS = trim($_POST['pass-second']);

  if($login === '' || $email === '' || $passF === '') {
    array_push($err_arr, "Не все поля заполнены");
    $submit = false;
  }
  if(mb_strlen($login, $encoding='UTF8') < 4) {
    array_push($err_arr,'Логин очень короткий');
    $submit = false;
  }
  if($passF !== $passS) {
    array_push($err_arr, 'Пароли не соответствуют друг другу. Попробуйте еще раз!');
    $submit = false;
  }
  if($submit){

    $check = ONEselect('users', ['email' => $email]);
    if(!empty($check['email']) && $check['email'] === $email) {
      array_push($err_arr, 'Пользователь с такой почтой уже существует');
    } else {
      $pass = password_hash($passF, PASSWORD_DEFAULT);
      
      $post = [
        'admin' => $admin,
        'user_name' => $login,
        'email' => $email,
        'age' => $age,
        'password' => $pass
      ];

      $id = insert('users', $post);
      
      $user = ONEselect('users', ['id' => $id]);

      userAuth($user);

    }
  }
} else {
  $login = '';
  $email = '';
  $age = '';
}


// Код для авторизации 

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

  $email = trim($_POST['email']);
  $pass = trim($_POST['password']);

  if($email === '' || $pass === '') {
    array_push($err_arr, 'Не все поля заполнены');
  } else {

    $check = ONEselect('users', ['email' => $email]);
    if($check && password_verify($pass, $check['password'])) {

      userAuth($check);

    } else {
      array_push($err_arr, 'Почта либо пароль введены неверно');
    }

  }

} else {
  $email = '';
}