<?php
// --- PHP blok na početku ---
$naslov     = "PHP dokument - vježba 1d";
$autor      = "Renato Dominkuš";
$opis       = "Ova stranica je nadogradnja vježbe 1c: biramo temu, odabiremo sliku i po želji prikazujemo opis.";
$dozvoljeneTeme = array("dark", "light");
$dozvoljeneSlike = array(
    "php" => "img/alekseynemiro-php-2060502_1920.jpg",
    "server" => "img/bru-no-server-4393370_1920.jpg",
    "code" => "img/boskampi-computer-1833058_1920.png");
$link_href  = "https://hr.wikipedia.org/wiki/PHP";
$link_text  = "Saznaj više o PHP-u";
$linkNatrag = "vjezba1c.php";

$temaKey  = isset($_GET["tema"]) && in_array($_GET["tema"], $dozvoljeneTeme) ? $_GET["tema"] : "dark";
$slikaKey = isset($_GET["slika"]) && isset($dozvoljeneSlike[$_GET["slika"]]) ? $_GET["slika"] : "php";
$prikaziOpis = isset($_GET["opis"]);

$slikaPath = $dozvoljeneSlike[$slikaKey];


if ($temaKey === "light") {
  $bg = "#f5edba";  // svijetla pozadina
  $card = "#ffffff";
  $text = "#271a54";
  $muted = "#a8a8a8";
  $accent = "#2047bd";
} else {
  $bg = "#03152b";  // tamna pozadina
  $card = "#ffffff";
  $text = "#271a54";
  $muted = "#a8a8a8";
  $accent = "#2047bd";
}
?>
<!DOCTYPE HTML>
<html>
    <head lang="hr">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <meta name="description" content="Vježba 1d - forma, izbor teme i slike.">   
    <title><?php echo htmlspecialchars($naslov); ?></title>
    <style>
        :root { 
            --bg:<?php echo $bg?>; 
            --card:<?php echo $card?>; 
            --text:<?php echo $text?>; 
            --muted:<?php echo $muted?>; 
            --accent:<?php echo $accent?>; 
        }
        * {box-sizing: border-box; }
    
        body {
            margin: 0; background: var(--bg); color:var(--text); 
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; 
            font-size: 16px; 
            line-height: 1.6;
        }
        .card_wrap{
            max-width: 720px; 
            margin: 48px auto; 
            background: var(--card); 
            padding: 32px; 
            border-radius: 16px; 
            box-shadow: 0 10px 30px rgba(0.0.0,.08);
        }
        h1 {
            margin-top: 0; 
            margin-bottom: 14px;
        }
        p {
            margin-bottom: 14px; 
            line-height: 1.6;
        }
        footer {
            font-size: 0.9rem; 
            color: var(--muted);
        }
        .btn {
            display: inline-block; 
            padding: 10px 16px; 
            border: 1px solid var(--accent); 
            border-radius: 10px; 
            text-decoration: none;
        }
        .btn:hover{ 
            background: var(--accent); 
            color: #fff;
        }
        .btn:focus-visible {
            outline: 3px solid var(--accent);
        }
        .btn:active {
            opacity: 0.8;
        }
        a {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .row{
            display:flex; 
            gap:12px; 
            flex-wrap:wrap; 
            margin-top:10px;
        }
        .figure{
            margin: 10px 0 16px;
        }
        .figure img{
            max-width:100%; 
            height:auto; 
            display:block; 
            border-radius:10px;
        }
        form{
            margin-top: 8px;
        }
        label{
            display:block;
            margin: 6px 0;
        }
        select, input[type="radio"], input[type="checkbox"]{
            margin-right:6px;
        }
        fieldset{
            border:1px solid #e5e7eb; 
            border-radius:10px; 
            padding:10px 12px; 
            margin:10px 0;
        }
        legend{
            padding:0 6px; 
            color: var(--muted);
        }

    </style>
    </head>
    <body>
        <main class="card_wrap">
            <h1><?php echo htmlspecialchars($naslov) ?></h1>
            <p>Ovu stranicu izradio je <strong><?php echo htmlspecialchars($autor) ?></strong>.</p>
            <div class="figure">
            <img src="<?php echo htmlspecialchars($slikaPath);?>" alt="<?php echo htmlspecialchars($slikaKey);?>">
            </div>
            <?php if ($prikaziOpis): ?>
                <p><?php echo htmlspecialchars($opis);?></p>
            <?php endif ?>
            <form method="get" action="vjezba1d.php">
                <fieldset>
                    <legend>Odaberi temu</legend>
                    <label><input type="radio" name="tema" value="dark" <?php echo $temaKey==="dark" ? "checked" : ""; ?>> Dark</label>
                    <label><input type="radio" name="tema" value="light" <?php echo $temaKey==="light" ? "checked" : ""; ?>> Light</label>
                </fieldset>

                <fieldset>
                    <legend>Odaberi sliku</legend>
                    <label for="slika">Slika:</label>
                    <select id="slika" name="slika">
                        <option value="php"     <?php echo $slikaKey==="php"     ? "Selected" : ""; ?>>PHP</option>
                        <option value="server"  <?php echo $slikaKey==="server"  ? "Selected" : ""; ?>>Server</option>
                        <option value="code"    <?php echo $slikaKey==="code"    ? "Selected" : ""; ?>>Code</option>
                    </select>
                </fieldset>
                
                <label><input type="checkbox" name="opis" <?php echo $prikaziOpis ? "checked" : ""; ?>>Prikaži opis</label>

                <div class="row">
                    <button class="btn" type="submit">Primjeni odabir</button>
                    <a class="btn" href="<?php echo htmlspecialchars($linkNatrag)?>" target="_blank">Natrag na vježba 1c</a>
                </div>

            </form>
            <footer>&copy; <?php echo date('Y'); ?> - Demo za PHP</footer>
        </main>
    </body>
</html>
    <!--- Naziv datoteke: vjezba1d.php --->