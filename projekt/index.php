<?php
 require 'connection.php';
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

<main class ="container">
<section>

    <h2 class="section-title" id="europe">EUROPA</h2>

    <div class="news-grid">

        <?php

        $query = "SELECT * FROM vijesti
                  WHERE arhiva=0
                  AND kategorija='europa'
                  ORDER BY id DESC
                  LIMIT 3";

        $result = mysqli_query($dbc,$query);

        while($row = mysqli_fetch_array($result))
        {
            echo '<article class="article">';

            echo '<img src="img/' . $row["slika"] .'">';

            echo '<h3>';
            echo '<a href="clanak.php?id='.$row["id"].'">';
            echo $row["naslov"];
            echo '</a>';
            echo '</h3>';

            echo '<p class="date">'.$row["datum"].' '. substr($row["vrijeme"], 0, 5) . '</p>';

            echo '</article>';
        }

        ?>

    </div>

</section>


<section>

    <h2 class="section-title" id="technology">TEKNAUTAS</h2>

    <div class="news-grid">

        <?php

        $query = "SELECT * FROM vijesti
                  WHERE arhiva=0
                  AND kategorija='teknautas'
                  ORDER BY id DESC
                  LIMIT 3";

        $result = mysqli_query($dbc,$query);

        while($row = mysqli_fetch_array($result))
        {
            echo '<article class="article">';

            echo '<img src="img/' . $row["slika"] .'">';

            echo '<h3>';
            echo '<a href="clanak.php?id='.$row["id"].'">';
            echo $row["naslov"];
            echo '</a>';
            echo '</h3>';

            echo '<p class="date">'.$row["datum"].' '. substr($row["vrijeme"], 0, 5) .'</p>';

            echo '</article>';
        }

        ?>

    </div>

</section>
</main>
<?php include 'footer.php';
mysqli_close($dbc);
?>
</body>

</html>