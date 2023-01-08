<?php 

function pintarMenu(string $nombre) { ?>

    <nav>
        <ul>
            <li><a href="http://localhost:8000/ut4/Cookies/ej_cookies/pagina1.php">Pagina 1</a></li>
            <li><a href="http://localhost:8000/ut4/Cookies/ej_cookies/pagina2.php">Pagina 2</a></li>
            <li><a href="http://localhost:8000/ut4/Cookies/ej_cookies/config.php">Config</a></li>
            <li><div><?= $nombre ?></div></li>
        </ul>
    </nav>


    <h1>Mal, no hacer</h1>
    <hr>

<?php } ?>