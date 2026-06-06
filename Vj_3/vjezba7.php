<?php
// --- PHP blok na početku ---
$naslov     = "PHP dokument - vježba 7";
$autor      = "Renato Dominkuš";
$varijabla_a = isset($_GET["var_a"]) ? (int)$_GET["var_a"] : null;
$varijabla_b = isset($_GET["var_b"]) ? (int)$_GET["var_b"] : null;
$ocjene_arr = array($varijabla_a, $varijabla_b);
$prosjek = ($ocjene_arr[0] + $ocjene_arr[1])/2;
$ocjena = round($prosjek);

if($ocjene_arr[0] == 1 || $ocjene_arr[1] == 1){
    $ocjena = 1;
}

  $bg = "#f5edba";  // svijetla pozadina
  $card = "#ffffff";
  $text = "#271a54";
  $muted = "#a8a8a8";
  $accent = "#2047bd";
  $buttonBg ="#ffffff";


  
?>

<!DOCTYPE html>
<html lang="hr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <meta name="description" content="Vježba 7 - forma, array">   
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
            <form method="get" action="vjezba7.php">
                <label>Izračun ocjene</label>
                <label>Upiši ocjenu prvog kolokvija <input type="number" name="var_a" min=1 max=5 required></label>
                <label>Upiši ocjenu drugog kolokvija <input type="number" name="var_b" min=1 max=5 required></label>
                <label>Prosjek: <?php echo htmlspecialchars($prosjek)?></label>
                <label>Konačna ocjena: <?php echo htmlspecialchars($ocjena)?></label>
                <button class="btn" type="submit">Izračunaj</button>
            </form>
        </main>
    </body>
</html>
