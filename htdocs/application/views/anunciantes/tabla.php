
<div id="tabla_anunciantes">
    <?php
    $rubro_ant = 0;
    foreach ($anunciantes as $anunciante) :
        if ($anunciante['idrubros'] != $rubro_ant):
            ?>
            <?php if ($rubro_ant != 0): ?>
            </div>
            </div>
        <?php endif ?>
        <div>
            <h1><?php echo $anunciante['rubro'] ?></h1>
            <div id="tabla">
                <?php $rubro_ant = $anunciante['idrubros']; ?>
            <?php endif ?>
            <div class="anunciante">
                <ul>
                    <?php if ($usuario != false && $usuario['idnivel'] <= Administrador): ?>
                        <div>
                            <a class="floatright icono eliminar" href="/anunciantes/eliminar/<?php echo $anunciante['idanunciantes'] ?>" onclick="return (window.confirm('¿Esta seguro que quiere eliminar esta nota?'));">
                                Eliminar
                            </a>
                        </div>
                    <?php endif ?>
                    <li>
                        Nombre: <strong><?php echo $anunciante['nombre'] ?></strong>
                    </li>
                    <?php if ($anunciante['logo'] != ''): ?>
                        <li>
                            <img src="/images/anunciantes/<?php echo $anunciante['logo'] ?>">
                        </li>
                    <?php endif ?>
                    <li>
                        Direccion: <?php echo $anunciante['direccion'] ?>
                    </li>
                    <li>
                        Telefono: <?php echo $anunciante['telefono'] ?>
                    </li>
                    <?php if ($anunciante['mail'] != ''): ?>
                        <li>
                            Mail: <a href="mailto:<?php echo $anunciante['mail'] ?>" target="_top"><?php echo $anunciante['mail'] ?></a>
                        </li>
                    <?php endif ?>
                    <?php if ($anunciante['web'] != ''): ?>
                        <li>
                            Web: <a href="<?php echo $anunciante['web'] ?>"><?php echo $anunciante['web'] ?></a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        <?php endforeach ?>
    </div>
</div>
</div>