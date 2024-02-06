<?php
include_once 'session.php';
include_once 'db.php';

$content = $_POST['content'];
$id = $_POST['id'];
$user_id = $_SESSION['user_id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($id) && !empty($content)) {
    //vse ok
    $query = "INSERT INTO comments(content,user_id,item_id,date_add) 
                    VALUES (?,?,?,NOW())";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$content,$user_id,$id]);
}
//preusmeri nazaj na oglas
header("Location: item.php?id=$id");

