<?php
$conn = mysqli_connect("localhost","root","","pwabaza");
if ($conn->connect_error) {
    die("Greška pri spajanju: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {

    $trazi = $_POST['ime'];

    $sql = "SELECT * FROM users WHERE ime='$trazi' OR prezime='$trazi'";

    $rezultat = $conn->query($sql);

    if ($rezultat->num_rows > 0) {

        echo "<h3>Pronađeni korisnici:</h3>";

        while($red = $rezultat->fetch_assoc()) {
            echo "ID: " . $red["id"] . "<br>";
            echo "Ime: " . $red["ime"] . "<br>";
            echo "Korisnicko ime: " . $red["korisnicko_ime"] . "<br>";
            echo "Drzava: " . $red["drzava"] . "<br>";
            echo "Opis: " . $red["opis"] . "<br>";
            echo "Email: " . $red["email"] . "<br>";
            echo "Phone: " . $red["phone"] . "<br>";
        }

    } else {
        echo "Korisnik nije pronađen.";
    }
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Vjezba15</title>
</head>
<body>
    <h2>Pretraga korisnika</h2>
    <form action="vjezba15.php" method="POST">
        <label>Ime ili prezime:</label><br>
        <input type="text" name="ime" required><br><br>
        <button type="submit" name="submit">Pretraga</button>
    </form>
</body>
</html>