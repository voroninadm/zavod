<?php

require "./machine-connect.php";

$customer = $_POST["customer"];

$checkCustomer = mysqli_query($DB_connect, "SELECT customer FROM client where customer = '$customer' LIMIT 1 ");
$countExist =  mysqli_num_rows($checkCustomer);

if ($countExist) {
  echo "$customer уже существует в базе данных";
} else {
  $post = mysqli_query($DB_connect, " INSERT INTO `client` (`id`, `customer`) VALUES (NULL, '$customer')");
  if (!$post) {
    die("Ошибка отправки данных в базу");
  } else
    echo "Новый заказчик '$customer' успешно добавлен!";
}
?>

<br>
<a href="../index.html">Перейти на гравную страницу</a>
