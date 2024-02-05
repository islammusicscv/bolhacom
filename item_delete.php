<?php
include_once 'session.php';
include_once 'db.php';

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($id)) {
    //vse ok
    $query = "DELETE FROM items WHERE id = ? AND user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id, $user_id]);
}

//preusmeri nazaj
header("Location: index.php");