<?php
include_once 'db.php';

$title = $_POST['title'];
$post_number = $_POST['post_number'];
$id = $_POST['id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title) && !empty($post_number)) {
    //vse ok
    $query = "UPDATE cities SET title=?, post_number=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$post_number,$id]);
    //preusmeri na seznam
    header("Location: cities.php");
}
else {
    //preusmeri nazaj na dodajanje
    header("Location: city_edit.php?id=$id");
}
