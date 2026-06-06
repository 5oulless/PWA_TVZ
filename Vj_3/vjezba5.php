<?php
// --- PHP blok na početku ---
$naslov     = "PHP dokument - vježba 5";
$autor      = "Renato Dominkuš";
$opis       = "Ova stranica je nadogradnja vježbe 1d: izračunavanje vrijednosti iz korisničkih unosa";
$varijabla_a = isset($_GET["var_a"]) ? (int)$_GET["var_a"] : null;
$varijabla_rand = rand(1,10);

  $bg = "#f5edba";  // svijetla pozadina
  $card = "#ffffff";
  $text = "#271a54";
  $muted = "#a8a8a8";
  $accent = "#2047bd";
  $buttonBg ="#ffffff";

  $gumbTekst = "Pogodi broj.";

  if (($varijabla_rand == $varijabla_a) and !(empty($varijabla_a))){
    $gumbTekst = "Točno! Pokušaj opet"; 
      $buttonBg ="#00ff00";
    }
    elseif (($varijabla_rand != $varijabla_a) and !(empty($varijabla_a))) {
    $gumbTekst = "Netočno! Pokušaj opet"; 
      $buttonBg ="#ff0000";
    }
?>
<!DOCTYPE html>
<html lang="hr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <meta name="description" content="Vježba 5 - forma, random">   
    <title><?php echo htmlspecialchars($naslov); ?></title>
    <style>
        :root { 
            --bg:<?php echo $bg?>; 
            --card:<?php echo $card?>; 
            --text:<?php echo $text?>; 
            --muted:<?php echo $muted?>; 
            --accent:<?php echo $accent?>;
            --button:<?php echo $buttonBg?>; 
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
            background: var(--button);
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
            <form method="get" action="vjezba5.php">
                <label>Igra, (pogodi broj)</label>
                <label>Upiši jedan broj od 1 do 10 <input type="number" name="var_a"></label>
                <button class="btn" type="submit"><?php echo htmlspecialchars($gumbTekst)?></button>

            </form>
            <footer>Tocan broj je <?php echo $varijabla_rand ?></footer>
        </main>
    </body>
</html>