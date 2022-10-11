<?php
session_start();
session_destroy();
unset($_COOKIE['nome']);
setcookie('nome', '');
header('Location: login.php');
