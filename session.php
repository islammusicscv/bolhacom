<?php
session_start();

if (!isset($_SESSION['user_id']) &&
    ($_SERVER['REQUEST_URI'] != '/bolhacom/login.php') &&
    ($_SERVER['REQUEST_URI'] != '/bolhacom/registration.php')) {
    header("Location: login.php");
    die();
}