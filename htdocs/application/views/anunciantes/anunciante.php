
<script src="/scripts/anunciantes/treeview.js"></script>
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
                if (isset($nombre_form))
                    echo $nombre_form
                    ?></h1>
        </div>
        <div>
            <div id="treeview"></div>
            <div id="rubros" style="visibility: hidden"><?php
                if (isset($rubros_form))
                    echo $rubros_form
                    ?>"/>
            </div>
        </div>
        <?php if (isset($direccion_form)): ?>
            <div>
                <span>Dirección</span>
            </div>
            <div>
                <span>
                    <?php echo $direccion_form ?>
                </span>
            </div>
        <?php endif ?>
        <?php if (isset($telefono_form)): ?>
            <div>
                <span>Teléfono</span>
            </div>
            <div>
                <span>
                    <?php echo $telefono_form ?>
                </span>
            </div>
        <?php endif ?>
        <?php if (isset($mail_form)): ?>
            <div>
                <span>Mail</span>
            </div>
            <div>
                <span>
                    <?php
                    echo $mail_form
                    ?>
                </span>
            </div>
        <?php endif ?>
        <?php if (isset($web_form)): ?>
            <div>
                <span>Web</span>
            </div>
            <div>
                <span>
                    <?php echo $web_form ?>
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
</div>