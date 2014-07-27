
<script src="/scripts/anunciantes/treeview.js"></script>
<script src="/kendo_js/kendo.web.min.js"></script>

<div class="contenido">
    <div id="principal">

        <div id="formulario">
            <div class="clearboth"></div>
            <div class="error"><?php
                if (isset($error_anunciante))
                    echo $error_anunciante
                    ?></div>
            <?php echo form_open_multipart('/anunciantes/editar/submit/' . $idanunciantes) ?>


            <div class="floatleft">
                <div>
                    <label for="titulo">Nombre *</label>
                </div>
                <div>
                    <input type="text" name="nombre" maxlength="100" value="<?php
                    if (isset($nombre_form))
                        echo $nombre_form
                        ?>"/>
                </div>
                <div>
                    <label for="rubro">Rubro *</label>
                </div>
                <div>
                    <div id="treeview"></div>
                    <input id="rubros" type="hidden" name="rubros" value="<?php
                    if (isset($rubros_form))
                        echo $rubros_form
                        ?>"/>
                </div>
            </div>
            <div class="floatleft">
                <div>
                    <label for="logo">Logo</label>
                </div>
                <div>
                    <input type="file" name="logo" size="45" />
                </div>
                <?php if (isset($logo_form)): ?>
                    <div>
                        <img src="/images/anunciantes/<?php echo $logo_form ?>"/>
                    </div>
                    <div>
                        <input type="checkbox" name="eliminar">
                        <label for="eliminar">Eliminar Imágen</label>
                    </div>
                <?php endif ?>
                <div>
                    <label for="direccion">Dirección *</label>
                </div>
                <div>
                    <input type="text" name="direccion" maxlength="100" value="<?php
                    if (isset($direccion_form))
                        echo $direccion_form
                        ?>"/>
                </div>
                <div>
                    <label for="telefono">Teléfono *</label>
                </div>
                <div>
                    <input type="text" name="telefono" maxlength="100" value="<?php
                    if (isset($telefono_form))
                        echo $telefono_form
                        ?>"/>
                </div>
                <div>
                    <label for="mail">Mail</label>
                </div>
                <div>
                    <input type="text" name="mail" maxlength="100" value="<?php
                    if (isset($mail_form))
                        echo $mail_form
                        ?>"/>
                </div>
                <div>
                    <label for="mail">Web</label>
                </div>
                <div>
                    <input type="text" name="web" maxlength="100" value="<?php
                    if (isset($web_form))
                        echo $web_form
                        ?>"/>
                </div>
                <div>
                    <label for="descripcion">Descripción</label>
                </div>
                <div>
                    <textarea type="text" rows="15" name="descripcion" maxlength="10000"><?php
                        if (isset($descripcion_form))
                            echo $descripcion_form
                            ?></textarea>
                </div>

                <input id="botonconfrev" type="submit" onclick="return (window.confirm('¿Esta seguro que quiere agregar este anunciante?'));" value="Confirmar" />
                <div>
                    Los campos con "*" son obligatorios.
                </div>

            </div>
            <div class="floatleft">
                <div class="error"><?php
                    if (isset($error_especial))
                        echo $error_especial
                        ?></div>
                <div class="texto">
                    SOLO COMPLETAR SI EL ANUNCIANTE ES ESPECIAL
                </div>
                <div>
                    <input type="checkbox" name="especial" value="true" <?php
                    if (isset($especial_form))
                        echo ' checked';
                    ?>/>Especial
                </div>

                <div>
                    <label for="link">Link</label>
                </div>
                <div>
                    <input type="text" name="link" maxlength="100" value="<?php
                    if (isset($link_form))
                        echo $link_form
                        ?>"/>
                </div>
                <div>
                    <label for="logo_especial">Imagen Especial</label>
                </div>
                <div>
                    <input type="file" name="logo_especial" size="45" />
                </div>
                <?php if (isset($logo_especial_form)): ?>
                    <?php if (file_exists('/images/anunciantes/especiales/' + $logo_especial_form)): ?>
                        <div>
                            <img src="/images/anunciantes/especiales/<?php echo $logo_especial_form ?>"/>
                        </div>
                    <?php else: ?>
                        <div>
                            <img src="/images/anunciantes/<?php echo $logo_especial_form ?>"/>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            </div>
            </form>

            <div class="clearboth"></div>
        </div>
        <div id="aside" class="col_anunciantes">
            <div class="anexo">
            </div>

            <div class="anexo">
            </div>
        </div>
        <div class="clearboth"></div>
    </div>
</div>