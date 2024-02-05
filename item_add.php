<?php
include_once 'header.php';
?>
    <form action="item_insert.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Dodaj oglas</h1>
        <div class="form-floating">
            <input type="text" id="floatingInput1" class="form-control" name="title" placeholder="Vnesi naslov" required="required" /><br />
            <label for="floatingInput1">Naslov oglasa</label>
        </div>
        <div class="form-floating">
            <textarea name="description" class="form-control" placeholder="Opis" id="floatingTextarea" rows="6" style="height:100%"></textarea><br />
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
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                }
                ?>
            </select><br />
            <label for="floatingSelect">Izberi kategorijo</label>
        </div>
        <div class="form-floating">
            <input type="number" id="floatingInput3" class="form-control" name="price" placeholder="Vnesi ceno" /><br />
            <label for="floatingInput3">Vnesi ceno</label>
        </div>
        <div class="form-floating">
            <input type="date" id="floatingInput4" class="form-control" name="date_end" placeholder="Vnesi datum zaključka" required="required" /><br />
            <label for="floatingInput4">Vnesi datum zaključka</label>
        </div>

        <input type="submit" class="btn btn-primary w-100 py-2" value="Shrani" />
    </form>

<?php
include_once 'footer.php';
?>