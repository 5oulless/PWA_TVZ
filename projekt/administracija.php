<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'connection.php';
if (!isset($_SESSION['razina'])){
    $_SESSION['razina'] = 0;
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    $stmt = mysqli_prepare($dbc, "DELETE FROM vijesti WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_close($dbc);

    header("Location: administracija.php");
    exit;
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$limit = 30;
$offset = ($page - 1) * $limit;

$totalQuery = "SELECT COUNT(*) as total FROM vijesti";
$totalResult = mysqli_query($dbc, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);

$total = $totalRow['total'];
$totalPages = ceil($total / $limit);

$query = "SELECT * FROM vijesti ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($dbc, $query);
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

<?php if($_SESSION['razina'] == 1){?>
<table>
    <tr>
        <th>ID</th>
        <th>Naslov</th>
        <th>Kategorija</th>
        <th>Datum</th>
        <th>Akcije</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['naslov']); ?></td>
            <td><?php echo $row['kategorija']; ?></td>
            <td><?php echo $row['datum']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="administracija.php?delete=<?php echo $row['id']; ?>"
                   onclick="return confirm('Obrisati članak?')">
                    Delete
                </a>
            </td>
        </tr>
    <?php } ?>

</table>

<div class="pagination">
    <?php if ($page > 1) {
    echo '<a href="administracija.php?page='. $page - 1 . '"> Previous</a>';} 
    ?>

<?php for ($i = 1; $i <= $totalPages; $i++) { 
    echo '<a class="stranice" href="administracija.php?page=' .$i . '"'; 
    if ($i == $page){ echo 'id="currentPage"';}
       echo '>' . $i . '</a>';
    } 
?>

<?php if ($page < $totalPages) { 
    echo '
    <a href="administracija.php?page='. $page + 1 .'"> Next </a>';
    } 
?>
</div>
<?php } ?>
<?php if(!isset($_SESSION['user']))
{
    echo "<p class='loginMsg'>Morate se prijaviti. <a href='login.php'>Login</a><p>";
}
else if($_SESSION['razina'] != 1)
{
    echo "<p class='loginMsg'>Pozdrav " . $_SESSION['ime'] . ", nemate pravo pristupa administraciji.</p>";
} 
?>
</main>
<?php include 'footer.php'?>
</body>
</html>