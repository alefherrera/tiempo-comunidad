
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


            <div class="float70">
                <div id="medio_anunciante">
                    <div class="error"><?php
                        if (isset($error_anunciante))
                            echo $error_anunciante
                            ?></div>
                    <h1><?php
                        if (isset($anunciantes['nombre']))
                            echo $anunciantes['nombre'];
                        ?></h1>
                    <div>
                        <div id="rubros" style="visibility: hidden"><?php
                            if (isset($anunciantes['rubros']))
                                echo $anunciantes['rubros'];
                            ?>
                        </div>
                    </div>
                </div>
                <div id="puntos_anunciante">
                    <?php if (isset($anunciantes['direccion'])): ?>
                        <div>
                            <span>Dirección</span><br/>
                            <?php echo $anunciantes['direccion'] ?>
                        </div>

                    <?php endif ?>
                    <?php if (isset($anunciantes['telefono'])): ?>
                        <div>
                            <span>Teléfono</span><br/>
                            <?php echo $anunciantes['telefono'] ?>
                        </div>

                    <?php endif ?>
                    <?php if (isset($anunciantes['mail']) && $anunciantes['mail'] != ''): ?>
                        <div>
                            <span>Mail</span><br/>
                            <a href="mailto:<?php echo $anunciantes['mail'] ?>"><?php echo $anunciantes['mail'] ?></a>
                        </div>

                    <?php endif ?>
                    <?php if (isset($anunciantes['web']) && $anunciantes['web'] != ''): ?>
                        <div>
                            <span>Web</span><br/>
                            <a href="<?php echo $anunciantes['web'] ?>"><?php echo $anunciantes['web'] ?></a>
                        </div>

                    <?php endif ?>
                    <?php if (isset($anunciantes['descripcion']) && $anunciantes['descripcion'] != ''): ?>
                        <div>
                            <span>Descripción</span><br/>
                            <?php echo nl2br($anunciantes['descripcion']) ?>
                        </div>

                    <?php endif ?>
                </div>
                <div id="tags_anunciante">
                    <div id="treeview"></div>

                </div>
            </div>
            <div class="clearboth"></div>
        </div>
    </div>
    <div id="aside" class="col_anunciantes">
    </div>
    <div class="clearboth"></div>
</div>
