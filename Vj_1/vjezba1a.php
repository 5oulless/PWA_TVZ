<!DOCTYPE HTML>
<html lang="hr">
    <head>
        <title>Programiranje web aplikacija</title>
        <meta charset="UTF-8">
        <meta name="author" content="Renato Dominkuš">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php 
        $naslov = "Moj prvi PHP dokument";
        $autor = "Renato Dominkuš";
        
        echo "<h1>$naslov</h1>";
        echo "<p>Ovu stranicu izradio je <strong>$autor</strong>.</p>";
        echo '<a href="https://www.gojira-music.com" target="_blank">Posjeti Gojira music</a>';
        
        ?>
    </body>
</html>