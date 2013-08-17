<div id="borde_separador">
    <div id="izquierda_revista">

        <div id="rayas">
            <div id="taparevactual">
                <?php if (isset($nombre_imagen)): ?>
                    <img class="imgprueba" src="/revista/<?php echo $nombre_imagen ?>"/>
                <?php endif ?>
            </div>
        </div>
        <br/>
        <?php if (isset($nombre_pdf)): ?>
            <a id="revpdf" href="/revista/<?php echo $nombre_pdf ?>">EDICIÓN IMPRESA</a> 

            <br/><br/>
        <?php endif ?>
    </div>
    <div id="central_revista">
        <?php if(isset($titulo)): ?>
        <div class="parrafo">

            <h4 class="numeroaño"><?php echo $mes . ' ' . $año ?></h4>

            <?php if (isset($titulo)): ?>
                <h1 class="titulo"><?php echo $titulo ?></h1>
            <?php endif ?>

            <p>
                <?php if (isset($editorial)): ?>
                    <?php echo nl2br($editorial); ?>
                <?php endif ?>
            </p>
            <a href="#" class="floatright" id="leermas">Leer Más +</a>
        </div>
    <?php endif ?>
    </div>
    <div class="clearboth"></div>
</div>