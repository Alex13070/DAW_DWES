<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="privada.php">Privada</a></li>
        <?php if (!isset($_SESSION[ID_USUARIO])) { ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Registro</a></li>
        <?php } else { ?>
            <li><?= $_SESSION[ID_USUARIO] ?></li>
            <li><img src="<?= $_SESSION['imagen'] ?>" alt="imagen usuario"></li>
            <li><a href="logout.php">Logout</a></li>
        <?php } ?>
    </ul>
</nav>