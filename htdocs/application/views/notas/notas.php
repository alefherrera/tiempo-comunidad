<script src="/scripts/notas.js"></script>

<div id="contenido">

    <div id="principal" class="col_izquierda">
        <div id="posicion_notas">
            
        </div>
        <?php if ($usuario != false && $usuario['idnivel'] < 2): ?>
            <div id="formulario" >
                <?php echo form_open_multipart('nueva_nota') ?>
                <div>
                    <label for="titulo">Titulo *</label>
                </div>
                <div>
                    <input type="text" name="titulo" maxlength="45" value="<?php
            if (isset($titulo_form))
                echo $titulo_form
                    ?>"/>
                </div>
                <div>
                    <label for="imagen">Imágen</label>
                </div>
                <div>
                    <input type="file" name="imagen" size="45" />
                </div>
                <div>
                    <label for="ano">Autor</label>
                </div>
                <div>
                    <input type="text" name="autor" maxlength="45" value="<?php
                   if (isset($autor_form))
                       echo $autor_form
                    ?>"/>
                </div>
                <div>
                    <label for="contenido">Contenido *</label>
                </div>
                <div>
                    <textarea name="contenido" maxlength="65000" rows="10"><?php
                   if (isset($contenido_form))
                       echo $contenido_form
                    ?></textarea>
                </div>
                <input id="botonconfrev" type="submit" onclick="return (window.confirm('¿Esta seguro que quiere crear esta nota?'))" value="Confirmar" />
                </form>
                <div>
                    Los campos con "*" son obligatorios.
                </div>
            </div>
        <?php endif ?>
    </div>

    <div id="aside" class="col_derecha" class="floatleft">
        <div class="anexo">
        </div>

        <div class="anexo">
        </div>
    </div>      
    <div class="clearboth"></div>
    <img src="http://31.media.tumblr.com/b0da13191054cc13bf2f92031510b73c/tumblr_ml2xp64tun1r827vgo1_400.gif"/>
</div>