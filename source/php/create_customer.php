<?php

require "db_connect.php";

$customer = $_POST["customer"];



$post = mysqli_query($DB_connect, " INSERT INTO `client` (`id`, `customer`) VALUES (NULL, '$customer')");
if (!$post) {
  die("Ошибка отправки данных в базу");
} else
  echo "Новый пользователь успешно добавлен!";
?>


<a href="../index.html">Перейти на гравную страницу</a>

<a href="../forms/adding_forms/add_customer_form.html">Добавить еще одного заказчика</a>
