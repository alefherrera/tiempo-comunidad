




<div id="contenido">

    <div id="contenido1" class="floatleft">
        <?php
        if (isset($titulo))
            echo '<h1>' . $titulo . '</h1>';
        if (isset($nombre_imagen))
            echo '<img src="/revista/' . $nombre_imagen . '"/>';
        echo '<br/>';
        if (isset($nombre_pdf))
            echo '<a href="/revista/' . $nombre_pdf . '">Link a Revista</a> <br/>';

        if (isset($error_upload))
            echo $error_upload;

        if ($usuario != false && $usuario['idnivel'] == 1) {
            echo form_open_multipart('do_upload');

            echo '
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" size="45" value="';
            if (isset($titulo_form))
                echo $titulo_form;
            echo '"/>
                    <br />
                    <label for="imagen">Portada (Imágen)</label>
                    <input type="file" name="imagen" size="45" />
                    <br />
                    <label for="pdf">Revista (PDF)</label>
                    <input type="file" name="pdf" size="45" />
                    <br />

                    <label for="ano">Año</label>';
            echo $this->common->select_año();
            echo '<label for="mes">Mes</label>';
            echo $this->common->select_mes();


            echo '<br/>
                    <input type="submit" onclick="return verificar_revista()" value="Confirmar" />

                    </form>';
        }
        ?>
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
        window.confirm("Ya existe una revista en el mes y año seleccionado: " + revista + " ¿Continuar?");
    }

</script>
