




<div id="contenido">




    <div id="tiempomes">


        <div class="success">
            <?php if (isset($success) && $success == true) echo 'Subido con éxito!'; ?>
        </div>

        <div id="inforev">

            <div id="rayas">
                <div id="taparevactual">
                    <?php if (isset($nombre_imagen)): ?>
                        <img class="imgprueba" src="/revista/<?php echo $nombre_imagen ?>"/>
                    <?php endif ?>
                </div>
            </div>
            <br/>
            <?php if (isset($nombre_pdf)): ?>
                <a id="revpdf" href="/revista/<?php echo $nombre_pdf ?>">EDICIÓN IMPRESA</a> 

                <br/><br/>
            <?php endif ?>
        </div>
        <div class="parrafo">

            <h4 class="numeroaño"><?php echo $mes . ' ' . $año ?></h4>

            <?php if (isset($titulo)): ?>
                <h1 class="titulo"><?php echo $titulo ?></h1>
            <?php endif ?>

            <article>
                <?php if (isset($editorial)): ?>
                    <?php echo nl2br($editorial); ?>
                <?php endif ?>
            </article>
            <a href="#" class="floatright" id="leermas">Leer Más +</a>

        </div>
        <div class="clearboth"></div>

        <?php if ($usuario != false && $usuario['idnivel'] == 1): ?>
            <p id="nueva">*NUEVA REVISTA</p>
            <div id="formulario">
                <?php if (isset($error_upload)): ?>
                    <div class="error"><?php echo $error_upload ?></div>
                <?php endif ?>
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
                    var texto;
                    $(function() {
                        var parrafo = $('.parrafo').find("article");
                        var leermas = $('#leermas');
                        var inforev = $('#inforev');
                        var tiempomes = $('#tiempomes');
                        var formulario = $('#formulario');

                        leermas.toggle();
                        if (!$('#formulario .error').text() > 0)
                            formulario.toggle();

                        if (parrafo.text().length > 600)
                        {
                            texto = parrafo.html();
                            parrafo.html(parrafo.html().substring(0, 600));
                            parrafo.html(parrafo.html() + '<div class="puntos">...</div><div class="mas"></div>');                            
                            leermas.toggle();
                        }

                        leermas.mouseup(function() {
                            leermas.removeAttr('href');
                            leermas.toggle();
                            var mas = parrafo.find(".mas");       
                            $(".puntos").hide();
                            mas.hide().html(texto.substring(600,texto.length)).slideDown('slow');
                            tiempomes.css("margin-bottom", "20");
                        });

                        $('#nueva').mouseup(function() {
                            formulario.slideToggle("slow", function() {
                                $(document).scrollTop( $("#nueva").offset().top );  
                            });
                        });

                    });
</script>
