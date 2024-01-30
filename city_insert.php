<?php
include_once 'db.php';

$title = $_POST['title'];
$post_number = $_POST['post_number'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title) && !empty($post_number)) {
    //vse ok
    $query = "INSERT INTO cities(title,post_number) 
                    VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$post_number]);
    //preusmeri na seznam
    header("Location: cities.php");
}
else {
    //preusmeri nazaj na dodajanje
    header("Location: city_add.php");
}
