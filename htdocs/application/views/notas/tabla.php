<div id="tabla_notas">
    <?php if ($cantidad == 0 || sizeof($notas) == 0 || $notas == false): ?>
        <p> No hay datos para mostrar </p>
    <?php else: ?>
        <div id="numeros">
            <ul>
                <li style="float:left; margin-right: 10px;">
                    <?php if ($pagina != 1): ?>
                        <a href='#1' style="text-decoration:underline"><<</a>
                    <?php else: ?>
                        <<
                    <?php endif ?>
                </li>
                <li style="float:left; margin-right: 10px;">
                    <?php if ($pagina != 1): ?>
                        <a href='#<?php echo ($pagina - 1) ?>' style="text-decoration:underline"> < </a>
                    <?php else: ?>
                        <
                    <?php endif ?>
                </li>
                <?php for ($i = 0; $i < sizeof($numeros); $i++): ?>
                    <li style="float:left; margin-right: 10px;">
                        <a href='#<?php echo $numeros[$i] + 1 ?>' style="text-decoration:underline; <?php
                        if ($i == $pagina - 1) {
                            echo 'background-color:red';
                        }
                        ?>"><?php echo $numeros[$i] + 1 ?></a>
                    </li>
                <?php endfor ?>
                <li style="float:left; margin-right: 10px;">
                    <?php if ($pagina != $ultima_pagina): ?>
                        <a href='#<?php echo ($pagina + 1) ?>' style="text-decoration:underline;">></a>
                    <?php else: ?>
                        >
                    <?php endif ?>
                </li>
                <li style="float:left; margin-right: 10px;">
                    <?php if ($pagina != $ultima_pagina): ?>
                        <a href='#<?php echo $ultima_pagina ?>' style="text-decoration:underline">>></a>
                    <?php else: ?>
                        >>
                    <?php endif ?>
                </li>
            </ul>
        </div>
        <div class="clearboth"></div>
        <div id="tabla">
            <?php
            foreach ($notas as $nota) {
                ?>
                <div class="nota">
                    <div class="nota_formato" >
                        <h5><?php echo $nota['fecha_alta']; ?> - Por <span><?php echo $nota['autor']; ?></span></h5>
                        <a href='/index.php/nota/<?php echo $nota['idnota'] ?>'><h1><?php echo $nota['titulo']; ?></h1></a>
                        <?php if ($nota['imagen'] != '' && file_exists('images/notas/thumb/' . $nota['imagen'])) { ?>
                            <img src='/images/notas/thumb/<?php echo $nota['imagen']; ?>' width="207px" height="
                            <?php
                                $size = getimagesize('images/notas/thumb/' . $nota['imagen']);
                                echo 207 * $size[1] / $size[0] . 'px';
                            ?>"/>

                        <?php } ?>
                        <p><?php echo $nota['bajada'] ?></p>
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


