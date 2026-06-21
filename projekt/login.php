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
<form method="POST" class="formaLogin">
    <input type="text" name="username" placeholder="Username" required>
    <br>
    <input type="password" name="password" placeholder="Password" required>
    <br>
    <button type="submit" name="login">Login</button>
    <?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($dbc,
        "SELECT * FROM korisnik WHERE korisnicko_ime=?"
    );

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if($user)
    {
        if(password_verify($password, $user['lozinka']))
        {
            $_SESSION['user'] = $user['korisnicko_ime'];
            $_SESSION['ime'] = $user['ime'];
            $_SESSION['razina'] = $user['razina'];

            header("Location: administracija.php");
            exit;
        }
        else {
            echo "<p>Kriva lozinka!</p>";
        }
    }
    else {
        echo "<p>Korisnik ne postoji. <a href='registracija.php'>Registracija</a></p>";
    }
}
?>
</form>



</main>
<?php include 'footer.php'?>

</body>