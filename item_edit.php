<?php
include_once 'header.php';
include_once 'db.php';

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM items WHERE id=? AND user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id, $user_id]);
$result = $stmt->fetch();

?>
    <form action="item_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
        <h1 class="h3 mb-3 fw-normal">Dodaj oglas</h1>
        <div class="form-floating">
            <input type="text" id="floatingInput1" class="form-control" value="<?php echo $result['title']; ?>" name="title" placeholder="Vnesi naslov" required="required" /><br />
            <label for="floatingInput1">Naslov oglasa</label>
        </div>
        <div class="form-floating">
            <textarea name="description" class="form-control" placeholder="Opis" id="floatingTextarea" rows="6" style="height:100%"><?php echo $result['description']; ?></textarea><br />
            <label for="floatingTextarea">Vnesi opis</label>
        </div>
        <div class="form-floating">
            <select name="category_id" required="required" id="floatingSelect" class="form-select">
                <?php
                include_once 'db.php';
                $query = "SELECT * FROM categories";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                while($row = $stmt->fetch()) {
                    if ($result['category_id']==$row['id']) {
                        echo '<option value="'.$row['id'].'" selected="selected">'.$row['title'].'</option>';
                    }
                    else {
                        echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                    }
                }
                ?>
            </select><br />
            <label for="floatingSelect">Izberi kategorijo</label>
        </div>
        <div class="form-floating">
            <input type="number" id="floatingInput3" class="form-control" value="<?php echo $result['price']; ?>" name="price" placeholder="Vnesi ceno" /><br />
            <label for="floatingInput3">Vnesi ceno</label>
        </div>
        <div class="form-floating">
            <input type="date" id="floatingInput4" class="form-control" value="<?php echo $result['date_end']; ?>" name="date_end" placeholder="Vnesi datum zaključka" required="required" /><br />
            <label for="floatingInput4">Vnesi datum zaključka</label>
        </div>

        <input type="submit" class="btn btn-primary w-100 py-2" value="Shrani" />
    </form>

<?php
include_once 'footer.php';
?>