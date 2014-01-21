
<script src="/scripts/anunciantes/anunciante.js"></script>
<script src="/kendo_js/kendo.web.min.js"></script>

<div class="contenido">
    <div id="principal" class="float70">

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
        <?php if (isset($anunciantes['direccion'])): ?>
            <div>
                <span>Dirección</span>
            </div>
            <div>
                <span>
                    <?php echo $anunciantes['direccion']?>
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
        <?php if (isset($anunciantes['web']) && $anunciantes['web']!= ''): ?>
            <div>
                <span>Web</span>
            </div>
            <div>
                <span>
                    <?php echo $anunciantes['web'] ?>
                </span>
            </div>
            <?php endif ?>
    </div>
    <div id="aside" class="float30" class="floatleft">
        <div class="anexo">
        </div>

        <div class="anexo">
        </div>
    </div>
    <div class="clearboth"></div>
</div>
