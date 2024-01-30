<?php
include_once 'header.php';
?>

<form action="city_insert.php" method="post" >
    <h1 class="h3 mb-3 fw-normal">Dodaj kraj</h1>

    <div class="form-floating">
        <input type="text" name="title" required="required" class="form-control" id="floatingInput" placeholder="Ime kraja" />
        <label for="floatingInput">Vnesi ime kraja</label>
    </div>
    <div class="form-floating">
        <input type="text" name="post_number" required="required" class="form-control" id="floatingPassword" placeholder="Vnesi poštno številko" />
        <label for="floatingPassword">Vnesi poštno številko</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Shrani</button>
</form>

<?php
include_once 'footer.php';
