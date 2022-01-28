<?php

require "db_connect.php";

$name = $_POST["name"];
$login = $_POST["login"];
$password = $_POST["password"];

$post = mysqli_query($DB_connect, "INSERT INTO `operator` (`id`, `name`, `login`, `password`) VALUES (NULL, '$name', '$login', '$password' )");
if (!$post) {
  die("Ошибка отправки данных в базу");
} else
  echo "Новый пользователь успешно добавлен!";
?>


<a href="../index.html">Вернуться на главную страницу</a>
<a href="../forms/adding_forms/add_operator_form.html">Добавить еще одного оператора</a>
