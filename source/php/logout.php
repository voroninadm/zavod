<?php

session_start();

$_SESSION = [];
header("Location: /index.html");
exit();
