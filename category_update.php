<?php
include_once 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$id = $_POST['id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title) && !empty($description)) {
    //vse ok
    $query = "UPDATE categories SET title=?, description=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$description,$id]);
    //preusmeri na seznam
    header("Location: categories.php");
}
else {
    //preusmeri nazaj na dodajanje
    header("Location: category_edit.php?id=$id");
}
