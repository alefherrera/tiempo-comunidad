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

        <li class='arbol_año'>
            <a href='<?php echo '#' . $revista['año'] ?>'> <?php echo $revista['año'] ?></a>
            <ul>
            <?php } ?>
            <li class='arbol_mes'>
                <a href='/index.php/revista/<?php echo $revista['mes'] . '/' . $revista['año'] ?>'><?php echo $revista['mes'] . ' - ' . $revista['titulo'] ?></a>
            </li>
            <?php
        }
        ?>
    </ul>

