<div id="borde_separador">
    <div id="izquierda_revista">

        <div id="rayas" class="pattern-white">
            <div id="taparevactual">
                <?php if (isset($nombre_imagen)): ?>
                    <img class="imgprueba" src="/revistas/<?php echo $nombre_imagen ?>"/>
                <?php endif ?>
            </div>
        </div>
        <br/>

    </div>
    <div id="central_revista">
        <?php if (isset($titulo)): ?>
            <div class="parrafo">
                <h4 class="floatleft numeroaño"><?php echo $mes . ' ' . $año ?></h4>
                <span class="floatleft">
                    | NOTA DE TAPA
                </span>
                <div class="clearboth"></div>
                <?php if (isset($titulo)): ?>
                    <h1 class="titulo"><?php echo $titulo ?></h1>
                <?php endif ?>

                <p class="texto">
                    <?php if (isset($editorial)): ?>
                        <?php echo nl2br($editorial); ?>
                    <?php endif ?>
                </p>
                <div class="fin_parrafo"></div>
                <div class="clearboth"></div>
                <div id="raya_parrafo"></div>
                <?php if (isset($nombre_pdf)): ?>
                    <div class="clearboth"></div>
                    <a id="revpdf" href="/revistas/<?php echo $nombre_pdf ?>">EDICIÓN IMPRESA</a> 
                <?php endif ?>
            </div>
        <?php endif ?>
    </div>

    <div class="clearboth"></div>
</div>