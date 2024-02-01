<?php
include_once 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title) && !empty($description)) {
    //vse ok
    $query = "INSERT INTO categories(title,description) 
                    VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$description]);
    //preusmeri na seznam
    header("Location: categories.php");
}
else {
    //preusmeri nazaj na dodajanje
    header("Location: category_add.php");
}
