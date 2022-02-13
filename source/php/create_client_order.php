<?php

require "./machine-connect.php";


$customer = $_POST["customer"];
$order_title = $_POST["order_title"];


$post = mysqli_query($DB_connect, " INSERT INTO `client_order` (`id`, `customer`, `order_title`) VALUES (NULL, '$customer', '$order_title')");
if (!$post) {
  die("Ошибка отправки данных в базу");
} else
  echo "Новый  заказ успешно добавлен!";
?>

<br>
<a href="../index.html">Перейти на гравную страницу</a>
