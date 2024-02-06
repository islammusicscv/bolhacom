<?php
$id = $_GET['id'];
include_once 'db.php';
$query = "SELECT i.*, c.title as category FROM items i INNER JOIN categories c ON c.id=i.category_id WHERE i.id=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetch();
//ce oglas s to številko ne obstaja
if (!$result) {
    header("Location: index.php");
    die();
}
include_once 'header.php';
?>
<div class="naslov"><strong><?php echo $result['title'];?></strong> (<?php echo $result['category'];?>)</div>
<h3><?php echo $result['price'];?> €</h3>
<div class="slike">
    <?php
    $query = "SELECT * FROM pictures WHERE item_id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    while ($row = $stmt->fetch()) {
        echo '<img src="'.$row['url'].'" alt="'.$row['description'].'" class="img-thumbnail" />';
    }
    ?>
</div>
<div class="opis"><?php echo $result['description'];?></div>
<?php
    if ($_SESSION['user_id'] == $result['user_id']) {
?>
<form action="picture_insert.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id;?>" />
    <div class="mb-3">
        <label for="formFile" class="form-label">Naloži sliko</label>
        <input class="form-control" type="file" id="formFile" name="fileToUpload" />
    </div>
    <input type="submit" name="submit" class="btn btn-primary w-100 py-2" value="Shrani" />
</form>
<?php
    }
?>
<hr />
<h2>Komentarji</h2>
<form action="comment_insert.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>" />
    <div class="form-floating">
        <textarea name="content" class="form-control" placeholder="Komentar" id="floatingTextarea" rows="6" style="height:100%"></textarea><br />
        <label for="floatingTextarea">Vnesi komentar</label>
    </div>
    <input type="submit" class="btn btn-primary w-100 py-2" value="Shrani" />
</form>
<hr />
<div class="komentarji">
    <?php
    $query = "SELECT c.*, u.first_name, u.last_name 
FROM comments c INNER JOIN users u ON u.id=c.user_id 
WHERE c.item_id=? ORDER BY date_add DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    while ($row=$stmt->fetch()){
        echo '<div class="komentar">';
        echo '<div class="uporabnik">'.$row['first_name'].' '.$row['last_name'].' @ '.date('j. n. Y H:i',strtotime($row['date_add'])).'</div>';
        echo $row['content'];
        echo '</div>';
    }
    ?>
</div>
<?php
include_once 'footer.php';
?>
