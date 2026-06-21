<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "connection.php";

$id = (int)$_GET["id"];

$stmt = mysqli_prepare($dbc, "SELECT * FROM vijesti WHERE id=?");
mysqli_stmt_bind_param($stmt,"i",$id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["update"])) {

    $naslov = $_POST["naslov"];
    $sazetak = $_POST["sazetak"];
    $tekst = $_POST["tekst"];
    $imeSlike = $row["slika"];

    if(isset($_FILES["slika"]) && $_FILES["slika"]["error"] == 0){
        $ekstenzija = strtolower(pathinfo($_FILES["slika"]["name"],PATHINFO_EXTENSION));
        $dozvoljeno = ["jpg","jpeg","png","webp"];
        if(in_array($ekstenzija, $dozvoljeno)){
            $imeSlike = uniqid() . "." . $ekstenzija;
            if(file_exists("img/" . $row["slika"])){
                unlink("img/" . $row["slika"]);
            }
            move_uploaded_file($_FILES['slika']['tmp_name'],"img/" . $imeSlike);
        }
    }
    $arhiva = isset($_POST['arhiva']) ? 1 : 0;
    $kategorija = $_POST["kategorija"];

    $stmt = mysqli_prepare($dbc, "UPDATE vijesti SET naslov=?, sazetak=?, tekst=?, kategorija=?, arhiva=?, slika=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssssisi", $naslov, $sazetak, $tekst, $kategorija,$arhiva, $imeSlike, $id);
    mysqli_stmt_execute($stmt);
    var_dump($imeSlike);

    header("Location: administracija.php");
    exit;
}
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
<form method="POST"  enctype="multipart/form-data">

    <p>Naslov:</p>
    <input class="inputtext" type="text" name="naslov" value="<?php echo htmlspecialchars($row["naslov"]); ?> " required>

    <p>Sažetak:</p>
    <textarea name="sazetak" required><?php echo htmlspecialchars($row["sazetak"]); ?></textarea>

    <p>Tekst:</p>
    <textarea name="tekst" rows="10" required><?php echo htmlspecialchars($row["tekst"]); ?></textarea>

    <p>Kategorija:</p>
    <select name="kategorija" required>
        <option value="europa" <?php if($row["kategorija"]=="europa") echo "selected"; ?>>Europa</option>
        <option value="teknautas" <?php if($row["kategorija"]=="teknautas") echo "selected"; ?>>Teknautas</option>
    </select>

    <p>Slika:</p>
    <img src="img/<?php echo $row['slika']; ?>" width="200">

    <input type="file" name="slika">

    <p>Arhiva?:</p>
        <input type="checkbox" name="arhiva" value="1"
            <?php if ($row['arhiva'] == 1) echo "checked"; ?>>

    <br><br>
    <button type="submit" name="update">Spremi izmjene</button>

</form>
</main>
<?php include 'footer.php'?>
</body>
</html>