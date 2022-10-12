<?php

require_once 'machine-connect.php';
require_once 'db.php';
require_once 'user_init.php';

$DB_connect = new mysqli($servername, $username, $password, $dbmain);



  //validating
  $login = $_POST['login'];
  $password = $_POST['password'];

  if (!check_user($DB_connect, $login)) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }

    $user = check_auth_user($DB_connect, $login);

    if ($user) {
      if (password_verify($password ,$user['password'])) {
        $_SESSION['user'] = $user;
      }

      //redirect to main page if user is auth and session is started
      if (isset($_SESSION['user'])) {
        header('Location: /report.phtml');
        exit();
      }
    }

