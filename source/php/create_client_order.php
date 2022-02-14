<?php

require "./machine-connect.php";


$customer = $_POST["customer"];
$order_title = $_POST["order_title"];

$checkOrder = mysqli_query($DB_connect, "SELECT order_title FROM client_order where order_title = '$order_title' LIMIT 1 ");
$countExist =  mysqli_num_rows($checkOrder);

if ($countExist) {
  echo "'$order_title' уже существует в базе данных";
} else {
$post = mysqli_query($DB_connect, " INSERT INTO `client_order` (`id`, `customer`, `order_title`) VALUES (NULL, '$customer', '$order_title')");
if (!$post) {
  die("Ошибка отправки данных в базу");
} else
  echo "Новый заказ '$order_title' успешно добавлен!";
}
?>

<br>
<a href="../index.html">Перейти на гравную страницу</a>
