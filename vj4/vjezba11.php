<?php
// --- PHP blok na početku ---
$naslov     = "PHP dokument - vježba 11";
$autor      = "Renato Dominkuš";

$ulaz = isset($_POST["num"]) ? $_POST["num"] : null;

  $bg = "#f5edba";  // svijetla pozadina
  $card = "#ffffff";
  $text = "#271a54";
  $muted = "#a8a8a8";
  $accent = "#2047bd";
  $buttonBg ="#ffffff";

function prosti($number){
    $count = 0;
    for($i = 2; $i <= $number/2 && $count == 0; $i++){
        if ($number % $i == 0){
            $count++;
        }
    }
    if($count == 0){
        return true;
    }else{
        return false;
    }
}
  
?>

<!DOCTYPE html>
<html lang="hr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <meta name="description" content="Vježba 11 - forma, funkcije">   
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
            <form method="POST" action="vjezba11.php">
                <label><strong>Broj za provjeru:</strong><br>
                <input type="number" id="num" name="num" min=2 required></label>
                
                <button class="btn" type="submit">Provjeri</button>
                
            </form>
            <?php
                if(prosti($ulaz) && isset($ulaz)){
                    echo "Broj $ulaz je prosti broj. <br>";
                } elseif (isset($ulaz)){
                    echo "Broj $ulaz nije prosti broj. <br>";
                }

                echo "Prosti brojevi do 100 su: ";
                for ($x = 2; $x <= 100; $x++){
                    if(prosti($x)){
                        echo "$x ";
                    }
                }
            ?>
        </main>
    </body>
</html>