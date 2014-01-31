
<script src="/scripts/anunciantes/anunciante.js"></script>
<script src="/kendo_js/kendo.web.min.js"></script>

<div class="contenido">
    <div id="principal" class="col_contenido">
        <div id="anunciante" class="border">
            <h5>Detalle Comercio</h5>
            <div id="imagen_anunciante">

                <?php if ($anunciantes['logo'] != ''): ?>
                    <li>
                        <img src="/images/anunciantes/<?php echo $anunciantes['logo'] ?>" width="214px">
                    </li>
                <?php endif ?>
            </div>

            <div id="medio_anunciante">
                <div class="clearboth"></div>
                <div class="error"><?php
                    if (isset($error_anunciante))
                        echo $error_anunciante
                        ?></div>
                <div>
                    <h1><?php
                        if (isset($anunciantes['nombre']))
                            echo $anunciantes['nombre'];
                        ?></h1>
                </div>
                <div>
                    <div id="treeview"></div>
                    <div id="rubros" style="visibility: hidden"><?php
                        if (isset($anunciantes['rubros']))
                            echo $anunciantes['rubros'];
                        ?>"/>
                    </div>
                </div>
                <div id="puntos_anunciante">
                    <?php if (isset($anunciantes['direccion'])): ?>
                        <div>
                            <span>Dirección</span>
                        </div>
                        <div>
                            <span>
                                <?php echo $anunciantes['direccion'] ?>
                            </span>
                        </div>
                    <?php endif ?>
                    <?php if (isset($anunciantes['telefono'])): ?>
                        <div>
                            <span>Teléfono</span>
                        </div>
                        <div>
                            <span>
                                <?php echo $anunciantes['telefono'] ?>
                            </span>
                        </div>
                    <?php endif ?>
                    <?php if (isset($anunciantes['mail']) && $anunciantes['mail'] != ''): ?>
                        <div>
                            <span>Mail</span>
                        </div>
                        <div>
                            <span>
                                <?php
                                echo $anunciantes['mail'];
                                ?>
                            </span>
                        </div>
                    <?php endif ?>
                    <?php if (isset($anunciantes['web']) && $anunciantes['web'] != ''): ?>
                        <div>
                            <span>Web</span>
                        </div>
                        <div>
                            <span>
                                <?php echo $anunciantes['web'] ?>
                            </span>
                        </div>
                    <?php endif ?>
                    <?php if (isset($anunciantes['descripcion']) && $anunciantes['descripcion'] != ''): ?>
                        <div>
                            <span>Descripción</span>
                        </div>
                        <div>
                            <?php echo nl2br($anunciantes['descripcion']) ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="clearboth"></div>
        </div>
    </div>
    <div id="aside" class="col_anunciantes">
    </div>
    <div class="clearboth"></div>
</div>
