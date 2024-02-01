<?php
include_once 'header.php';

$id = $_GET['id'];
include_once 'db.php';
$query = "SELECT * FROM categories WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetch();
?>
    <form action="category_update.php" method="post" >
        <h1 class="h3 mb-3 fw-normal">Uredi kategorijo</h1>
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
        <div class="form-floating">
            <input type="text" name="title" value="<?php echo $result['title']; ?>" required="required" class="form-control" id="floatingInput" placeholder="Ime" />
            <label for="floatingInput">Uredi ime</label>
        </div>
        <div class="form-floating">
            <textarea name="description" class="form-control" placeholder="Opis" id="floatingTextarea"><?php echo $result['description']; ?></textarea>
            <label for="floatingTextarea">Uredi opis</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Shrani</button>
    </form>

<?php
include_once 'footer.php';
