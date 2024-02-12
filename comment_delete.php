<?php
include_once 'session.php';
include_once 'db.php';

$id = $_GET['id'];
$item_id = $_GET['item_id'];
$user_id = $_SESSION['user_id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($id)) {
    //vse ok
    $query = "DELETE FROM comments WHERE id = ? AND 
                           user_id =?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id, $user_id]);
    if ($stmt->rowCount()>0) {
        msg('Uspešno izbrisan komentar','success');
    }
    else {
        msg('Niste lastnik komentarja','danger');
    }
}

//preusmeri nazaj
header("Location: item.php?id=$item_id");