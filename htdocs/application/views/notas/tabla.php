<div id="tabla_notas">
    <?php if ($cantidad == 0 || sizeof($notas) == 0 || $notas == false): ?>
        <p> No hay datos para mostrar </p>
    <?php else: ?>
        <div id="numeros" class='floatright'>
            <ul>
                <?php if ($pagina != 1): ?>
                    <li>

                        <a href='#1'>
                            <img src="/images/index/primero.png"/>
                        </a>
                    </li>

                <?php endif ?>
                <?php if ($pagina != 1): ?>
                    <li>

                        <a href='#<?php echo ($pagina - 1) ?>'> 
                            <img src="/images/index/adelante.png"/>
                        </a>
                    </li>

                <?php endif ?>

                <?php for ($i = 0; $i < sizeof($numeros); $i++): ?>
                    <li class="<?php
                    if ($i == $pagina - 1) {
                        echo 'selected';
                    }
                    ?>">
                        <a href='#<?php echo $numeros[$i] + 1 ?>'  ><?php echo $numeros[$i] + 1 ?></a>
                    </li>
                <?php endfor ?>
                <?php if ($pagina != $ultima_pagina): ?>
                    <li>

                        <a href='#<?php echo ($pagina + 1) ?>'>
                            <img src="/images/index/atras.png"/>
                        </a>
                    </li>

                <?php endif ?>
                <?php if ($pagina != $ultima_pagina): ?>
                    <li>

                        <a href='#<?php echo $ultima_pagina ?>'>
                            <img src="/images/index/ultimo.png"/>
                        </a>
                    </li>

                <?php endif ?>
            </ul>
            <div class='clearboth'></div>
        </div>
        <div class="clearboth"></div>
        <div id="tabla">
            <?php
            foreach ($notas as $nota) {
                ?>
                <div class="nota">
                    <div class="nota_formato" >
                        <h5><?php echo $nota['fecha_alta']; ?> - Por <span><?php echo $nota['autor'] == '' ? 'Anónimo' : $nota['autor']; ?></span></h5>
                        <a href='/notas/<?php echo $nota['idnota'] ?>'><h1><?php echo $nota['titulo']; ?></h1></a>
                        <?php if ($nota['imagen'] != '' && file_exists('images/notas/thumb/' . $nota['imagen'])) { ?>
                            <img src='/images/notas/thumb/<?php echo $nota['imagen']; ?>' width="207px" height="
                            <?php
                            $size = getimagesize('images/notas/thumb/' . $nota['imagen']);
                            echo 207 * $size[1] / $size[0] . 'px';
                            ?>"/>

                        <?php } ?>
                        <p><?php echo nl2br($nota['bajada']) ?></p>
                    </div>
                </div>


            <?php } ?>
            <div class="clearboth">
            </div>
        </div>
    <?php endif ?>
    <div class="clearboth"></div>
    <div class="error"><?php
        if (isset($error_nota))
            echo $error_nota
            ?></div>
</div>


