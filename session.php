<?php
session_start();

function isAdmin() {
    $return = false;
    if (isset($_SESSION['admin']) && $_SESSION['admin']==1) {
        $return = true;
    }

    if (!$return) {
        header("Location: index.php");
        die();
    }
}

function msg($msg, $type) {
    $_SESSION['msg'] = $msg;
    $_SESSION['type'] = $type;
}

if (!isset($_SESSION['user_id']) &&
    ($_SERVER['REQUEST_URI'] != '/bolhacom/login.php') &&
    ($_SERVER['REQUEST_URI'] != '/bolhacom/login_check.php') &&
    ($_SERVER['REQUEST_URI'] != '/bolhacom/registration.php')) {
    header("Location: login.php");
    die();
}