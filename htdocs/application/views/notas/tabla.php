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
        <div class="tabla">
            <?php
            foreach ($notas as $nota) {
                
                ?>
                <div style="width:33.33%; float:left;    -webkit-box-shadow:inset 0px 0px 0px 10px #f00;
    -moz-box-shadow:inset 0px 0px 0px 10px #f00;
    box-shadow:inset 0px 0px 0px 1px #f00; ">
                    <p><a href='/index.php/nota/<?php echo $nota['idnota'] ?>'><?php echo $nota['titulo'] ?></a> por <?php echo $nota['autor']; ?> - <?php echo $nota['fecha_alta']; ?></p> 
                    <p><?php echo $nota['bajada'] ?></p>
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


