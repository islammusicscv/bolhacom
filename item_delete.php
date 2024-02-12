<?php
include_once 'session.php';
include_once 'db.php';

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$admin = $_SESSION['admin'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($id)) {
    //vse ok
    $query = "DELETE FROM items WHERE id = ? AND (user_id = ? OR 1=?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id, $user_id,$admin]);
}

//preusmeri nazaj
header("Location: index.php");