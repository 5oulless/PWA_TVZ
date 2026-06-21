<?php

require "connection.php";

if (isset($_POST["insert"])) {

    $naslov = $_POST["naslov"];
    $sazetak = $_POST["sazetak"];
    $tekst = $_POST["tekst"];
    $slika = $_FILES['slika'];
    $ekstenzija = strtolower(
        pathinfo($slika['name'], PATHINFO_EXTENSION)
    );
    $dozvoljeno = ['jpg','jpeg','png','webp'];
    if(!in_array($ekstenzija, $dozvoljeno))
    {   die("Neispravan format slike."); }

    $imeSlike = uniqid() . "." . $ekstenzija;
    move_uploaded_file(
        $slika['tmp_name'],
        "img/" . $imeSlike
    );


    $arhiva = isset($_POST['arhiva']) ? 1 : 0;
    $kategorija = $_POST["kategorija"];
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $stmt = mysqli_prepare($dbc, "INSERT INTO vijesti (datum,naslov,sazetak,tekst,slika,kategorija,arhiva,vrijeme) VALUES (?,?,?,?,?,?,?,?);");

    mysqli_stmt_bind_param($stmt, "ssssssis", $date, $naslov, $sazetak, $tekst,$imeSlike, $kategorija,$arhiva,$time);
    mysqli_stmt_execute($stmt);
    mysqli_close($dbc);
    header("Location: unos.php");
    exit;
}
?>