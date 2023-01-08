<?php 

function pintarMenu() { ?>

    <nav>
        <ul>
            <li><a href="http://localhost:8000/ut4/Cookies/ej_sesiones/pagina1.php">Pagina 1</a></li>
            <li><a href="http://localhost:8000/ut4/Cookies/ej_sesiones/pagina2.php">Pagina 2</a></li>
            <li><a href="http://localhost:8000/ut4/Cookies/ej_sesiones/config.php">Config</a></li>
            <li><div><?= isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "Anonimo" ?></div></li>
        </ul>
    </nav>

<?php } ?>