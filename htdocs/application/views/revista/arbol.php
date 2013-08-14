<?php
$ano_anterior = 0;
foreach ($arbol as $revista) {
    if ($revista['año'] != $ano_anterior) {
        $ano_anterior = $revista['año'];
        ?>
        <ul>
            <li>
                <a href='<?php echo '#' . $revista['año'] ?>'> <?php echo $revista['año'] ?></a>
                <ul>
                    <li>
                        <a href='/index.php/revista/<?php echo $revista['mes'] . '/' . $revista['año'] ?>'><?php echo $revista['mes'] . ' - ' . $revista['titulo'] ?></a>
                    </li>
                </ul>
            </li>
        </ul>

    <?php } else {
        ?>
        <ul>
            <li>
                <a href='/index.php/revista/<?php echo $revista['mes'] . '/' . $revista['año'] ?>'><?php echo $revista['mes'] . ' - ' . $revista['titulo'] ?></a>
            </li>
        </ul>   
        <?php
    }
}
?>
