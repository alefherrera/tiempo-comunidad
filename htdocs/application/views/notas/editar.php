

<div class="contenido">
    <div id="principal" class="col_contenido">
        <p id="nueva">EDITAR NOTA</p>
        <div id="formulario" >
            <div class="error"><?php
                if (isset($error_nota))
                    echo $error_nota
                    ?></div>
            <?php echo form_open_multipart('/notas/editar_submit/' . $idnota) ?>
            <div>
                <label for="titulo">Titulo *</label>
            </div>
            <div>
                <input type="text" name="titulo" maxlength="45" value="<?php
                if (isset($titulo_form))
                    echo $titulo_form;
                ?>"/>
            </div>
            <div>
                <label for="imagen">Imágen</label>
            </div>
            <div>
                <input type="file" name="imagen" size="45" />
            </div>
            <?php if (isset($imagen_form)): ?>
                <div>
                    <img src="/images/notas/thumb/<?php echo $imagen_form ?>"/>
                </div>
                <div>
                    <input type="checkbox" name="eliminar">
                    <label for="eliminar">Eliminar Imágen</label>
                </div>
            <?php endif ?>
            <div>
                <label for="ano">Autor (si no se completa el autor será "Anónimo")</label>
            </div>
            <div>
                <input type="text" name="autor" maxlength="45" value="<?php
                if (isset($autor_form))
                    echo $autor_form
                    ?>"/>
            </div>
            <div>
                <label for="bajada">Bajada *</label>
            </div>
            <div>
                <textarea name="bajada" maxlength="65000" rows="4"><?php
                    if (isset($bajada_form))
                        echo $bajada_form;
                    ?></textarea>
            </div>
            <div>
                <label for="contenido">Contenido *</label>
            </div>
            <div>
                <textarea name="contenido" maxlength="65000" rows="15"><?php
                    if (isset($contenido_form))
                        echo $contenido_form
                        ?></textarea>
            </div>
            <input id="botonconfrev" type="submit" onclick="return (window.confirm('¿Esta seguro que quiere editar esta nota?'))" value="Confirmar" />
            </form>
            <div>
                Los campos con "*" son obligatorios.
            </div>
        </div>
        <div class="col_anunciantes">
        </div>
        <div class="clearboth"></div>
    </div>
</div>
