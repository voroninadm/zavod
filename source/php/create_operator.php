<?php

require "./machine-connect.php";

$name = $_POST["name"];
$login = str_replace(' ', '', $_POST["login"]);
$password = $_POST["password"];

$checkLogin = mysqli_query($DB_connect, "SELECT login FROM operator where login = '$login' LIMIT 1 ");
$countExist =  mysqli_num_rows($checkLogin);

if ($countExist) {
  echo "Оператор '$login' уже существует в базе данных";
} else {
  $post = mysqli_query($DB_connect, "INSERT INTO `operator` (`id`, `name`, `login`, `password`) VALUES (NULL, '$name', '$login', '$password' )");
  if (!$post) {
    die("Ошибка отправки данных в базу");
  } else
    echo "Новый пользователь c логином '$login' успешно добавлен!";
}

mysqli_close($DB_connect);
?>
