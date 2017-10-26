<?php
namespace Monitor;

require '../classes/Access.php';
require '../classes/Request.php';
require '../classes/Users.php';
require '../classes/Process.php';
require '../classes/Cases.php';
require '../classes/Task.php';
require '../vendor/autoload.php';

session_start();

if (!Access::isLoggedIn() && $_SERVER['REQUEST_URI'] != '/monitor/pages/login.php') {
    header("Location: login.php");
    exit();
}

