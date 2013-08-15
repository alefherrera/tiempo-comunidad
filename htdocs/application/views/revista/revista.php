




<div class="contenido">
    <div id="tiempomes">
        <div class="success">
            <?php if (isset($success) && $success == true) echo 'Subido con éxito!'; ?>
        </div>
        <div class="col_izquierda">
           <?php include 'mes_revista.php' ?>
        </div>
        <div class="col_derecha">
            <div id="arbol_revista">
                <?php include 'arbol.php' ?>
            </div>
        </div>
        <div class="clearboth"></div>

        <?php if ($usuario != false && $usuario['idnivel'] == 1): ?>
            <p id="nueva">*NUEVA REVISTA</p>
            <div id="formulario">
                <?php if (isset($error_upload)): ?>
                    <div class="error"><?php echo $error_upload ?></div>
                <?php endif ?>
                <?php echo form_open_multipart('revista/nueva_revista') ?>
                <div>
                    <label for="titulo">Titulo</label>
                </div>
                <div>
                    <input id="inputtitulo" type="text" name="titulo" maxlength="45" value="<?php if (isset($titulo_form)) echo $titulo_form ?>"/>
                </div>
                <div>
                    <label for="imagen">Portada (Imágen)</label>
                </div>
                <div>
                    <input type="file" name="imagen" size="45" />
                </div>
                <div>
                    <label for="pdf">Revista (PDF)</label>
                </div>
                <div>
                    <input type="file" name="pdf" size="45" />
                </div>
                <div>

                    <label for="ano">Año</label>
                </div>
                <div>
                    <?php
                    if (!isset($ano_form)) {
                        echo $this->common->select_año();
                    } else {
                        echo $this->common->select_año($ano_form);
                    }
                    ?>
                </div>
                <div>
                    <label for="mes">Mes</label>
                </div>
                <div>
                    <?php
                    if (!isset($mes_form)) {
                        echo $this->common->select_mes();
                    } else {
                        echo $this->common->select_mes($mes_form);
                    }
                    ?>
                </div>
                <div>
                    <label for="editorial">Editorial On-Line (Maximo 1000 caracteres)</label>
                </div>
                <div>
                    <textarea name="editorial" maxlength="1000" rows="10"><?php if (isset($editorial_form)) echo $editorial_form; ?></textarea>
                </div>
                <input id="botonconfrev" type="submit" onclick="return verificar_revista()" value="Confirmar" />
                </form>


            </div>
        <?php endif ?>


    </div><!-- tiempomes fin -->



</div>
<script src="/scripts/revista.js"></script>