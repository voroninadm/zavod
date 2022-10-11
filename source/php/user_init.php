<?php
require_once 'db.php';

//===== start session if auth is complete
session_start();
if ($_SESSION) {
   $current_user = $_SESSION['user'];
}
