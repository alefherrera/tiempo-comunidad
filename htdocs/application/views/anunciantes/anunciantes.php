<script src="/scripts/masonry.js"></script>
<script src="/scripts/anunciantes.js"></script>
<script src="/scripts/form.js"></script>

<div class="contenido">
    <div id="principal" class="float70">
        <div id="posicion_anunciantes">
            <?php include_once 'tabla.php'; ?>
        </div>
        <div class="clearboth"></div>
        <?php if ($usuario != false && $usuario['idnivel'] <= Administrador): ?>
            <p id="nueva">*NUEVO ANUNCIANTE</p>

            <div id="formulario" >
                <div class="clearboth"></div>
                <div class="error"><?php
                    if (isset($error_anunciante))
                        echo $error_anunciante
                        ?></div>
                <?php echo form_open_multipart('/anunciantes/nuevo_anunciante') ?>

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
                    <?php include_once 'rubros_select.php'; ?>
                </div>
                <div>
                    <label for="logo">Logo</label>
                </div>
                <div>
                    <input type="file" name="logo" size="45" />
                </div>
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
                <input id="botonconfrev" type="submit" onclick="return (window.confirm('¿Esta seguro que quiere agregar este anunciante?'))" value="Confirmar" />
                </form>
                <div>
                    Los campos con "*" son obligatorios.
                </div>
            </div>
        <?php endif ?>
    </div>

    <div id="aside" class="float30" class="floatleft">
        <div class="anexo">
        </div>

        <div class="anexo">
        </div>
    </div>
</div>