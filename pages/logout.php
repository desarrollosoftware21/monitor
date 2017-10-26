<?php
session_start();
unset($_SESSION['logged']);
unset($_SESSION['user_bonita']);
unset($_SESSION['password_bonita']);
unset($_SESSION['base_uri_bonita']);
session_destroy();
header("Location: login.php");