

<div id="contenido">
    <div id="nota" class="floatleft" style="word-wrap: break-word;">
        <h1>
            <?php echo $nota['titulo'] ?>
        </h1>
        <p>
            <?php echo $nota['contenido'] ?>

        </p>
        <?php if ($nota['imagen'] != ''): ?>
            <img src="/images/notas/<?php echo $nota['imagen'] ?>"/>
        <?php endif ?>
        <p>
            Por <?php echo $nota['autor'] ?> el <?php echo $nota['fecha_alta'] ?>
        </p>
    </div>

    <div id="aside" class="floatleft">
        <div id="anexo1">
        </div>

        <div id="anexo2">
        </div>
    </div>      
    <div class="clearboth"></div>
</div>