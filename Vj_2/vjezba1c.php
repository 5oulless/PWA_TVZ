<?php
// --- PHP blok na početku ---
$naslov     = "PHP dokument - vježba 1c";
$autor      = "Renato Dominkuš";
$opis       = "Ova stranica je nastavak vježbe 1b i služi za prikazivanje osnovne funkcionalnosti php-a.";
$link_href  = "https://hr.wikipedia.org/wiki/PHP";
$link_text  = "Saznaj više o PHP-u";
$linkNatrag = "vjezba1b.php";
?>
<!DOCTYPE HTML>
<html>
    <head lang="hr">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <title><?php echo htmlspecialchars($naslov); ?></title>
    <style>
        :root { --bg:#03152b; --card:#ffffff; --text:#271a54; --muted:#a8a8a8; --accent:#2047bd; }
        * {box-sizing: border-box; }
        body {margin: 0; background: var(--bg); color:var(--text); font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; font-size: 16px; line-height: 1.6;}
        .card_wrap{max-width: 720px; margin: 48px auto; background: var(--card); padding: 32px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0.0.0,.08);}
        h1 {margin-top: 0; margin-bottom: 14px;}
        p {margin-bottom: 14px; line-height: 1.6;}
        footer {font-size: 0.9rem; color: var(--muted);}
        .btn {display: inline-block; padding: 10px 16px; border: 1px solid var(--accent); border-radius: 10px; text-decoration: none;}
        .btn:hover{ background: var(--accent); color: #fff;}
        .btn:focus-visible {outline: 3px solid var(--accent);}
        .btn:active {opacity: 0.8;}
        a {text-decoration: none;}
        a:hover {text-decoration: underline;}

    </style>
    </head>
    <body>
        <main class="card_wrap">
            <h1><?php echo htmlspecialchars($naslov) ?></h1>
            <p>Ovu stranicu izradio je <strong><?php echo htmlspecialchars($autor) ?></strong>.</p>
            <p><?php echo htmlspecialchars($opis)?></p>
            <p> <a class="btn" href="<?php echo htmlspecialchars($link_href); ?>" target="_blank"><?php echo htmlspecialchars($link_text)?></a>
            <a class="btn" href="<?php echo htmlspecialchars($linkNatrag)?>" target="_blank">Natrag na vježba 1b</a></p>
            <footer>&copy; <?php echo date('Y'); ?> - Demo za PHP</footer>
        </main>
    </body>
</html>
    <!--- Naziv datoteke: vjezba1c.php --->