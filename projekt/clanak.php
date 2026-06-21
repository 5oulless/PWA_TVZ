<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 require 'connection.php';

 $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
    $stmt = mysqli_prepare($dbc, "SELECT * FROM vijesti WHERE id = ? and arhiva = 0");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($dbc);
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
        <?php 
            if($row["kategorija"] == "europa"){
                echo '<p id="clanEu">EUROPA</p>';
            }else{
                echo '<p id="clanTeh">TEKNAUTAS</p>';
            }
        ?>
    </header>
    <div class="clanOutline">
    <?php 
        echo '<h2 class="clanNaslov">'. $row["naslov"] .'</h2>
            <p>' .$row["sazetak"] .' </p>
            <img src="img/'.$row["slika"] .'" id="clanSlika">';
    ?>
    </div>
    <main class="container2">
        <?php 
        echo '<p><strong>'. substr($row["datum"],8,2) . '/'. substr($row["datum"],5,2) . '/'. substr($row["datum"],0,4) . '</strong></p>';
        $text = trim($row["tekst"]);
        $paragraph = preg_split('/\R\R+/', $text);
         foreach ($paragraph as $p) {
        echo '<p>' . nl2br(htmlspecialchars(trim($p))) . '</p>';
        }
        ?>
    </main>
    <?php include 'footer.php'?>
</body>
</html>
