<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "connection.php";
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <meta name="description" content="Projektni zadatak PWA">
    <meta name="author" content="Renato Dominkuš">
    <title>El Confidencial</title>   
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>El Confidencial</h1>
        <p>EL DIARIO DE LOS LECTORES INFLUYENTES</p>
        <?php include 'navigation.php'?>
    </header>
<main class="container">
<form method="POST" action ="skripta.php" enctype="multipart/form-data">

    <p>Naslov:</p>
    <input class="inputtext" type="text" name="naslov" required>

    <p>Sažetak:</p>
    <textarea name="sazetak" required></textarea>

    <p>Tekst:</p>
    <textarea name="tekst" rows="10" required></textarea>

    <p>Kategorija:</p>
    <select name="kategorija" required>
        <option value="europa" selected>Europa</option>
        <option value="teknautas">Teknautas</option>
    </select>

    <p>Slika:</p>
    <input type="file" name="slika" required>

    <p>Arhiva?:</p>
        <input type="checkbox" name="arhiva" value="1">

    <br><br>
    <button type="submit" name="insert">Unesi članak</button>

</form>
</main>
<?php include 'footer.php'?>
</body>
</html>