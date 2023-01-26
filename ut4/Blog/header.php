<?php

require_once("./funciones.php");
?>

<nav>
    <ul>
        <li class="nav_item">
            <a class="nav_item" href="<?= URL_RAIZ ?>/ut4/Blog/index.php">
                <div>
                    <p class="texto_nav">Inicio</p>
                </div>
            </a>  
        </li>
        <li class="nav_item">
            <a class="nav_item" href="<?= URL_RAIZ ?>/ut4/Blog/crearPost.php">
                <div>
                    <p class="texto_nav">Crear post</p>
                </div>
            </a>
        </li>
        <li class="nav_item">
            <a class="nav_item" href="#">
                <div>
                    <p class="texto_nav">???</p>
                </div>
            </a>
        </li>
        <?php if (isset($_SESSION["correo"])) { ?>
            <li class="nav_item usuario">
                <a href="<?= URL_RAIZ ?>/ut4/Blog/detallesUsuario.php">
                    <div class="foto">
                        <span><img class="foto_perfil" src="./images/usuario.png" alt="imagen de foto de usuario"></span>
                        <div class="texto_foto"><?= $_SESSION["correo"] ?></div>
                    </div>
                </a>
            </li>
        <?php } else { ?>
            <li class="nav_item nav_item_right">
                <a class="nav_item" href="<?= URL_RAIZ ?>/ut4/Blog/login.php">
                    <div>
                        <p class="texto_nav">Iniciar sesión</p>
                    </div>
                </a>
            </li>
        <?php }?>
    </ul>
</nav>