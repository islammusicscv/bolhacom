<?php
    include_once 'header.php';
?>

<h1>Registracija</h1>

<form action="user_insert.php" method="post">
    <input type="text" name="first_name" placeholder="Vnesi svoje ime" required="required" /><br />
    <input type="text" name="last_name" placeholder="Vnesi svoj priimek" required="required" /><br />
    <input type="text" name="telephone" placeholder="Vnesi svoj telefon" /><br />
    <input type="email" name="email" placeholder="Vnesi svojo e-pošto" required="required" /><br />
    <input type="password" name="pass" placeholder="Vnesi svoje geslo" required="required" /><br />
    <input type="submit" value="Registriraj" />
</form>

<?php
    include_once 'footer.php';
?>