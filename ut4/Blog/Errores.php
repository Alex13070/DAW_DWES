<?php if (count($errores) > 0) { ?>
    <section>
        <?php foreach($errores as $error) { ?>
            <p class="error"> <?= $error ?> </p>
        <?php } ?>             
    </section>    
<?php } ?>