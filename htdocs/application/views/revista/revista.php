




<div id="contenido">

    
        <div id="tiempomes">
            
            
        <div class="success">
            <?php if(isset($success) && $success == true) echo 'Subido con éxito!'; ?>
        </div>
       
        <div id="inforev">
            
            <div id="taparevactual">
                <?php if (isset($nombre_imagen)): ?>
                    <img class="imgprueba" src="/revista/<?php echo $nombre_imagen ?>"/>
            <?php endif ?>
            </div>
            <br/>
            <?php if (isset($nombre_pdf)): ?>
                <a id="revpdf" href="/revista/<?php echo $nombre_pdf ?>">EDICIÓN IMPRESA</a> 
                
                <br/><br/>
            <?php endif ?>
        </div>
        <div class="parrafo">
            
            <h4 class="numeroaño"><?php echo $mes.' '.$año ?></h4>
            
             <?php if (isset($titulo)): ?>
                <h1 class="titulo"><?php echo $titulo ?></h1>
            <?php endif ?>
                
                <article>
                <?php if(isset($editorial)):?>
                    <?php echo nl2br($editorial); ?>
                <?php endif ?>
                </article>
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
                    <label for="editorial">Editorial On-Line (Maximo 1000 caracteres)</label>
                </div>
                <div>
                    <textarea name="editorial" maxlength="1000" rows="10"><?php if (isset($editorial_form)) echo $editorial_form;?></textarea>
                </div>
                <input id="botonconfrev" type="submit" onclick="return verificar_revista()" value="Confirmar" />
                </form>
                
       
            </div>
        <?php endif ?>
           
    
        </div><!-- tiempomes fin -->
        
        
              
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
