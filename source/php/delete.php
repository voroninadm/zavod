<?php
require_once 'config.php';

if(isset($_GET["id"]))
{
  $url = $_SERVER['REQUEST_URI'];
  $machine = $_GET["machine"];

  $conn = new mysqli($servername, $username, $password, $machine);
  if($conn->connect_error){
    die("Ошибка соединения: " . $conn->connect_error);
  }
  $task_id = $_GET["id"];
  $sql = "DELETE FROM primbase WHERE id = '{$task_id}'";
  if($conn->query($sql)){

    header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  else{
    echo "Ошибка: " . $conn->error;
  }
  $conn->close();
}
?>
