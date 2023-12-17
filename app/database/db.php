<?php 

session_start();

require('connect.php');

function printUser($value) {
  echo '<pre>';
  print_r($value);
  echo '</pre>';
}

function dbError($request) {
  $errorIn = $request->errorInfo();
  if($errorIn[0] !== PDO::ERR_NONE) {
    print($errorIn[2]);
    exit();
  }
  return true;
}

// Получение данных из одной таблицы
function ALLselect($tables, $params = []) {
  global $pdo;

  $quest = "select * from $tables";

  if(!empty($params)) {
    $i = 0;
    foreach($params as $key => $value) {
      if(!is_numeric($value)){
        $value = "'".$value."'";
      }
      if($i === 0) {
        $quest = $quest . " where $key=$value";
      }
      else {
        $quest = $quest . " and $key=$value";
      }
      $i++;
    }
  }
  
  $request = $pdo->prepare($quest);
  $request->execute();

  dbError($request);
  
  return $request->fetchAll();
}

// Получение одной строки из таблицы
function ONEselect($tables, $params = []) {
  global $pdo;

  $quest = "select * from $tables";

  if(!empty($params)) {
    $i = 0;
    foreach($params as $key => $value) {
      if(!is_numeric($value)){
        $value = "'".$value."'";
      }
      if($i === 0) {
        $quest = $quest . " where $key=$value";
      }
      else {
        $quest = $quest . " and $key=$value";
      }
      $i++;
    }
  }
  
  $request = $pdo->prepare($quest);
  $request->execute();

  dbError($request);
  
  return $request->fetch();
}

// Запись в таблицу бд
function insert($tables, $params) {
  global $pdo;
  $i = 0;
  $col = '';
  $mask = '';

  foreach($params as $key=>$value) {
    if($i === 0) {
      $col = $col . "$key";
      $mask = $mask . "'$value'";
    }
    else {
      $col = $col . ", $key";
      $mask = $mask . ", '$value'";
    }
    $i++;
  }

  $sql = "insert into $tables ($col) values ($mask)";
  $request = $pdo->prepare($sql);
  $request->execute($params);

  dbError($request);
  return $pdo->lastInsertId();
}
// $arrData = [
//   'admin' => 0,
//   'user_name' => 'nikolas',
//   'email' => 'nikolas@mail.ru',
//   'password' => '1234421'
// ];

// insert('users', $arrData);

// обновление строки в бд
function update($tables, $id, $params) {
  global $pdo;
  $i = 0;
  $str = '';

  foreach($params as $key=>$value) {
    if($i === 0) {
      $str = $str . $key . " = '" . $value . "'";
    }
    else {
      $str = $str . ", " . $key . " = '" . $value . "'";
    }
    $i++;
  }

  $sql = "update $tables set $str where id=$id";
  $request = $pdo->prepare($sql);
  $request->execute($params);

  dbError($request);
}
// $param = [
//   'admin' => 1,
//   'password' => '123'
// ];

// update('users', $id=7, $param);

// функция удаления 
function delete($tables, $id) {
  global $pdo;
  $sql = "delete from $tables where id=$id";

  $request = $pdo->prepare($sql);
  $request->execute();
  dbError($request);
}

// delete('users', $id = 7)

// Выбираем записи для вывода автора поста в админку

function ALLselectPostUsers($table1, $table2) {
  global $pdo;

  $sql = "select 
  t1.id,
  t1.title,
  t1.path_img,
  t1.content,
  t1.id_topic,
  t1.published,
  t1.created,
  t2.user_name
  from $table1 as t1 join $table2 t2 on t1.id_user = t2.id";

  $request = $pdo->prepare($sql);
  $request->execute();
  dbError($request);

  return $request->fetchAll();
}


// выбираем записи для вывода автора поста на главную страницу

function ALLselectPostAuthorIndex($table1, $table2) { 

  global $pdo;

  $sql = "select p. *, user_name from $table1 as p join $table2 as u on p.id_user = u.id where p.published=1";

  $request = $pdo->prepare($sql);
  $request->execute();
  dbError($request);

  return $request->fetchAll();

}

// Выбираем записи для вывода автора поста на one.php
function ALLselectPostAuthorOne($table1, $table2, $id) { 
  global $pdo;

  $sql = "select p.*, u.user_name from $table1 as p join $table2 as u on p.id_user = u.id where p.id=$id";
  $request = $pdo->prepare($sql);
  $request->execute();
  dbError($request);

  return $request->fetch();
}
?>