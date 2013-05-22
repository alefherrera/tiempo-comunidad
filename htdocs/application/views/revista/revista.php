




<div id="contenido">

    <div id="contenido1" class="floatleft">
        
        <div class="success">
            <?php if(isset($success) && $success == true) echo 'Subido con éxito!'; ?>
        </div>
        <?php if (isset($titulo)): ?>
                <h1 id="test"><?php echo $titulo ?></h1>
            <?php endif ?>
        <div id="inforev">
            
            <?php if (isset($nombre_imagen)): ?>
                <img src="/revista/<?php echo $nombre_imagen ?>"/>
            <?php endif ?>
            <br/>
            <?php if (isset($nombre_pdf)): ?>
                <a id="revpdf" href="/revista/<?php echo $nombre_pdf ?>">Edición Impresa</a> <br/>
            <?php endif ?>
        </div>
        <div style="float:left; width:522px; word-wrap: break-word;">
                <?php if(isset($editorial)):?>
                    <?php echo nl2br($editorial); ?>
                <?php endif ?>
        </div>
        <div class="clearboth"></div>
        <?php if (isset($error_upload)): ?>
            <div id="class"><?php echo $error_upload ?></div>
        <?php endif ?>
        <?php if ($usuario != false && $usuario['idnivel'] == 1): ?>
            <div id="formulario" >
                <?php echo form_open_multipart('do_upload') ?>
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
                    <?php echo $this->common->select_año(); ?>
                </div>
                <div>
                    <label for="mes">Mes</label>
                </div>
                <div>
                    <?php echo $this->common->select_mes(); ?>
                </div>
                <div>
                    <label for="editorial">Editorial On-Line</label>
                </div>
                <div>
                    <textarea name="editorial" maxlength="500" rows="5"><?php if (isset($editorial_form)) echo $editorial_form;?></textarea>
                </div>
                <input id="botonconfrev" type="submit" onclick="return verificar_revista()" value="Confirmar" />
                </form>
            </div>
        <?php endif ?>
    </div>

    <div id="aside" class="floatleft">
        <div id="anexo1">
        </div>

        <div id="anexo2">
        </div>
    </div>          
</div>


<script>
                function verificar_revista()
                {
                    //        $.get('/index.php/verificar_revista/' + $('#ddlMes').val() + '/' + $('#ddlAno').val(), function(revista){
                    //            if(revista === 'false')
                    //                return false;
                    //            window.confirm("Ya existe una revista en el mes y año seleccionado: " + revista + " ¿Continuar?");
                    //        });

                    var revista;
                    $.ajax({url: '/index.php/verificar_revista/' + $('#ddlMes').val() + '/' + $('#ddlAno').val(),
                        async: false,
                        dataType: 'html',
                        success: function(data) {
                            revista = data;
                        }
                    });
                    if (revista === 'false')
                        return true;
                    return window.confirm("Ya existe una revista en el mes y año seleccionado: " + revista + " ¿Continuar?");
                }

</script>
