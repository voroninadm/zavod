<?php

require "./machine-connect.php";

$name = $_POST["name"];
$login = str_replace(' ', '', $_POST["login"]);
$password = $_POST["password"];

$checkLogin = mysqli_query($DB_connect, "SELECT login FROM master where login = '$login' LIMIT 1 ");
$countExist =  mysqli_num_rows($checkLogin);

if ($countExist) {
  echo "Мастер '$login' уже существует в базе данных";
} else {
  $post = mysqli_query($DB_connect, "INSERT INTO `master` (`id`, `name`, `login`, `password`) VALUES (NULL, '$name', '$login', '$password')");
  if (!$post) {
    die("Ошибка отправки данных в базу");
  } else {
    echo "Новый мастер с логином '$login' успешно добавлен в базу данных!";
  }
};

mysqli_close($DB_connect);
?>

