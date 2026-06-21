
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    echo '<nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="kategorija.php?kategorija=europa">EUROPA</a></li>
                <li><a href="kategorija.php?kategorija=teknautas">TEKNAUTAS</a></li>
                <li><a href="administracija.php">ADMINISTRACIJA</a></li>
                <li><a href="unos.php">UNOS</a></li>';
                if(isset($_SESSION['user']))
                    {echo '<li><a href="logout.php">LOGOUT</a></li>';
                }
        
        echo '</ul>
        </nav>';
?>