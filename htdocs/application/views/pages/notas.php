

<div id="contenedor">
    <?php
    if ($cantidad == 0 || sizeof($notas) == 0 || $notas == false)
        echo "NO HAY QUE MOSTRAR";
    else {
        foreach ($notas as $nota) {
            ?>
            <div>
                <p><a href='notas/<?php echo $nota['idnota'] ?>'><?php echo $nota['titulo'] ?></a></p>
                <p><?php echo $nota['contenido'] ?></p>
            </div>

        <?php } ?>
        <div id="numeros">
            <ul>
                <li style="float:left; margin-right: 10px;">
                    <?php if ($pagina != 1): ?>
                        <a href='/index.php/notas/1'><<</a>
                    <?php else: ?>
                        <<
                    <?php endif ?>
                </li>
                <li style="float:left; margin-right: 10px;">
                    <?php if ($pagina != 1): ?>
                        <a href='/index.php/notas/<?php echo ($pagina - 1) ?>'> < </a>
                    <?php else: ?>
                        <
                    <?php endif ?>
                </li>
                <?php for ($i = 0; $i < sizeof($numeros); $i++): ?>
                    <li style="float:left; margin-right: 10px;">
                        <a href='/index.php/notas/<?php echo $numeros[$i] + 1 ?>'><?php echo $numeros[$i] + 1 ?></a>
                    </li>
                <?php endfor ?>
                <li style="float:left; margin-right: 10px;">
                    <?php if ($pagina != $ultima_pagina): ?>
                        <a href='/index.php/notas/<?php echo ($pagina + 1) ?>'>></a>
                    <?php else: ?>
                        >
                    <?php endif ?>
                </li>
                <li style="float:left; margin-right: 10px;">
                    <?php if ($pagina != $ultima_pagina): ?>
                        <a href='/index.php/notas/<?php echo $ultima_pagina ?>'>>></a>
                    <?php else: ?>
                        >>
                    <?php endif ?>
                </li>
            </ul>

        </div>
    <?php } ?>

</div>