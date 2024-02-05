<?php
include_once 'session.php';
include_once 'db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$category_id = $_POST['category_id'];
$description = $_POST['description'];
$price = $_POST['price'];
$date_end = $_POST['date_end'];

$user_id = $_SESSION['user_id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title) && !empty($price) && !empty($date_end) && !empty($category_id)) {
    //vse ok
    $query = "UPDATE items SET title=?, description=?, price=?, date_end=?, category_id=? 
                WHERE id=? AND user_id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$description,$price,$date_end,$category_id,$id,$user_id]);
    //preusmeri na index
    header("Location: index.php");
    die();
}
//preusmeri nazaj
header("Location: item_edit.php?id=$id");

