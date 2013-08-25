<ul>
    <?php
    $ano_anterior = 0;
    foreach ($arbol as $revista) {
        if ($revista['año'] != $ano_anterior) {
            if ($ano_anterior != 0):
                ?>
            </li>
            </ul>
            <?php
        endif;
        $ano_anterior = $revista['año'];
        ?>

        <li>
            <a id="<?php echo $revista['año']?>" class='arbol_ano <?php if ($revista['año'] == $año) echo "seleccionado_ano" ?>' href='<?php echo '#' . $revista['año'] ?>'><span>•</span> <?php echo $revista['año'] ?></a>
            <ul>
            <?php } ?>
            <li>
                <a id="<?php echo $revista['mes']?>" class='arbol_mes <?php if (Common::mes($revista['mes']) == $mes && $revista['año'] == $año) echo "seleccionado_mes" ?>' href='/index.php/revista/<?php echo $revista['mes'] . '/' . $revista['año'] ?>'><?php echo Common::mes($revista['mes']) . ' - ' . $revista['titulo'] ?></a>
            </li>
            <?php
        }
        ?>
    </ul>