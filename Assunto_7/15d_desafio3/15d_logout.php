<?php
session_start();

$_SESSION = [];
session_destroy();

header('Location: 15d_login.php');
exit();
