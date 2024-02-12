<?php
include_once 'db.php';
include_once 'session.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

//preverim ali je user vnese email in pass
if (!empty($email) && !empty($pass)) {
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['pass'])) {
        //podatki so pravilni
        msg("Uspešna prijava","success");
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['admin'] = $user['admin'];
        header("Location: index.php");
    }
    else {
        msg("Napaka v podatkih.","danger");
        header("Location: login.php");
    }
}