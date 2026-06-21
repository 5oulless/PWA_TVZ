<?php
 require 'connection.php';
 $kategorija = isset($_GET['kategorija']) ? $_GET['kategorija'] : 'europa';
 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$stmtTotal = mysqli_prepare($dbc, "SELECT COUNT(*) FROM vijesti WHERE arhiva=0 AND kategorija=?");
mysqli_stmt_bind_param($stmtTotal, "s", $kategorija);
mysqli_stmt_execute($stmtTotal);
mysqli_stmt_bind_result($stmtTotal, $total);
mysqli_stmt_fetch($stmtTotal);
mysqli_stmt_close($stmtTotal);

$totalPages = ceil($total / $limit);

$statement = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija=? ORDER BY id DESC LIMIT ? OFFSET ?";
$stmt = mysqli_prepare($dbc, $statement);

mysqli_stmt_bind_param($stmt, "sii", $kategorija, $limit, $offset);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
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
    </header>

<main class="container">

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <article class="kategorijeArticle">
        <img src="img/<?php echo htmlspecialchars($row["slika"]); ?>">
        <div class="kategorijeArticleContent">
        <h3>
            <a href="clanak.php?id=<?php echo $row["id"]; ?>">
                <?php echo htmlspecialchars($row["naslov"]); ?>
            </a>
        </h3>
        <p> <?php echo $row["sazetak"];?>
        </p>

        <p class="date">
            <?php echo $row["datum"]; ?> <?php echo substr($row["vrijeme"], 0, 5); ?>
        </p>
    </div>
    </article>

<?php } ?>

</main>

<div class="pagination">

    <?php if ($page > 1) {
    echo '<a href="kategorija.php?kategorija='. $kategorija. '&page='. $page - 1 . '"> Previous</a>';
    } 
    ?>

<?php for ($i = 1; $i <= $totalPages; $i++) { 
    echo '<a class="stranice" href="kategorija.php?kategorija='. $kategorija. '&page='. $i.'"'; 
    if ($i == $page){ echo 'id="currentPage"';}
       echo '>' . $i . '</a>';
    } 
?>

<?php if ($page < $totalPages) { 
    echo '<a href="kategorija.php?kategorija='. $kategorija. '&page='. $page + 1 . '"> Next </a>';
    } 
?>


</div>

</body>
<?php include 'footer.php'?>
</html>