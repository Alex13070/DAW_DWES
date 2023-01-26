<?php 


const URL_RAIZ = "http://localhost:8000";


function clean_input($data) : string {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function pintarPost(string $imagen, string $correo, string $titulo, string $cuerpo) { ?>
    <div class="post">
        <section class="foto">
            <img class="foto_perfil" src="<?= $imagen ?>" alt="imagen de foto de usuario">
            <div class="texto_foto"><?= $correo ?></div>
        </section>

        <section class="flex titulo">
            <span class="nombre_apartado">Titulo: </span>
            <p><?= $titulo ?></p>
        </section>
                    
        <section class="flex">
            <span class="nombre_apartado">Cuerpo: </span>
            <p><?= $cuerpo ?></p>
        </section> 
    </div>
<?php }


function pintarPostEnlazado(string $imagen, string $correo, string $titulo, string $cuerpo, string $enlace) { ?>
    <a class="no_decorar" href="<?= $enlace ?>">
        <?php pintarPost($imagen, $correo, $titulo, $cuerpo); ?>
    </a>    
<?php } 

?>