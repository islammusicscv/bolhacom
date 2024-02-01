<?php
include_once 'header.php';
?>

    <form action="category_insert.php" method="post" >
        <h1 class="h3 mb-3 fw-normal">Dodaj kategroijo</h1>

        <div class="form-floating">
            <input type="text" name="title" required="required" class="form-control" id="floatingInput" placeholder="Ime kategroije" />
            <label for="floatingInput">Vnesi ime kategorije</label>
        </div>
        <div class="form-floating">
            <textarea name="description" class="form-control" placeholder="Opis" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Vnesi opis</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Shrani</button>
    </form>

<?php
include_once 'footer.php';
