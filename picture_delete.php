<?php
include_once 'session.php';
include_once 'db.php';

$id = $_GET['id'];
$item_id = $_GET['item_id'];
$user_id = $_SESSION['user_id'];


//preverim ali so vnešeni vsi obvezni podatki
if (!empty($id)) {
    $query = "SELECT * FROM pictures WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $picture = $stmt->fetch();

    //vse ok
    $query = "DELETE FROM pictures WHERE id = ? AND 
                           (item_id IN (SELECT id 
                                        FROM items 
                                        WHERE user_id=?))";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id, $user_id]);

    $deleted = $stmt->rowCount();
    //vrne nam št. izbrisanih vrstic
    if ($deleted>0) {
        unlink($picture['url']);
    }
}

//preusmeri nazaj
header("Location: item.php?id=$item_id");