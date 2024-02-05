<?php
include_once 'session.php';
include_once 'db.php';

$title = $_POST['title'];
$category_id = $_POST['category_id'];
$description = $_POST['description'];
$price = $_POST['price'];
$date_end = $_POST['date_end'];

$user_id = $_SESSION['user_id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title) && !empty($price) && !empty($date_end) && !empty($category_id)) {
    //vse ok
    $query = "INSERT INTO items(title, description, price, date_add, date_end, category_id, user_id) 
                    VALUES (?, ?, ?, NOW(), ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$description,$price,$date_end,$category_id,$user_id]);
    //preusmeri na index
    header("Location: index.php");
    die();
}
//preusmeri nazaj
header("Location: item_add.php");

