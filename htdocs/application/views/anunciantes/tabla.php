
<div id="tabla_anunciantes">
    <div id="tabla" class="pattern-white">

        <?php
        foreach ($anunciantes as $anunciante) :
            ?>
            <div>
                <div class="anunciante">
                    <span class="rubro"><?php echo $anunciante['rubro'] ?></span>
                    <ul>
                        <?php if ($usuario != false && $usuario['idnivel'] <= Administrador): ?>
                            <div>
                                
                            </div>
                        <?php endif ?>
                        <li>
                            <a class="title float60" href="/anunciantes/<?php echo $anunciante['idanunciantes'] ?>"><strong><?php echo $anunciante['nombre'] ?></strong></a>
                            <ul class="floatright">
                                    <li class="floatleft">
                                        <a class="icono editar" href="/anunciantes/editar/<?php echo $anunciante['idanunciantes'] ?>">
                                            Editar
                                        </a>
                                    </li>
                                    <li class="floatleft">
                                        <a class="icono eliminar" href="/anunciantes/eliminar/<?php echo $anunciante['idanunciantes'] ?>" onclick="return (window.confirm('¿Esta seguro que quiere eliminar esta nota?'));">
                                            Eliminar
                                        </a>
                                    </li>
                                </ul>

                                <div class="clearboth"></div>
                        </li>
                        <?php if ($anunciante['logo'] != ''): ?>
                            <li>
                                <img src="/images/anunciantes/<?php echo $anunciante['logo'] ?>" width="174px" height="98px">
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
            </div>

        <?php endforeach ?>
    </div>
    <div class="clearboth"></div>

</div>