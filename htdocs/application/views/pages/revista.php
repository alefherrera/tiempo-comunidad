




<div id="contenido">

    <div id="contenido1" class="floatleft">
        <?php
            echo '<div id="inforev" >';
        if (isset($titulo))
            echo '<h1>' . $titulo . '</h1>';
        if (isset($nombre_imagen))
            echo '<img src="/revista/' . $nombre_imagen . '"/> ';
        echo '<br/>';
        if (isset($nombre_pdf))
            echo '<a id="revpdf" href="/revista/' . $nombre_pdf . '">Revista .pdf</a> <br/>';
        echo '</div>';
        if (isset($error_upload))
            echo $error_upload;

        if ($usuario != false && $usuario['idnivel'] == 1) {
            echo '<div id="formulario" >';
            echo form_open_multipart('do_upload');

            echo '<table>
                <tr>
                <td>
                    <label for="titulo">Titulo</label>
                </td>
                <td>
                    <input id="inputtitulo" type="text" name="titulo" size="45" value="';
            if (isset($titulo_form))
                echo $titulo_form;
            echo '"/>
                    </td>
                    <tr>
                    <td>
                        <label for="imagen">Portada (Imágen)</label>
                    </td>
                    <td>
                        <input type="file" name="imagen" size="45" />
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <label for="pdf">Revista (PDF)</label>
                    </td>
                    <td>
                        <input type="file" name="pdf" size="45" />
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <label for="ano">Año</label>
                    </td>
                    <td>';
                        echo $this->common->select_año();
                        echo '
                    </td>
                    <tr>
                    <td>
                    <label for="mes">Mes</label>
                    </td>
                    <td>';
                        echo $this->common->select_mes();
                        echo '
                    </td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                    
                    <input id="botonconfrev" type="submit" onclick="return verificar_revista()" value="Confirmar" />
                    </td>
                    </tr>
                    </table>
                    </form>';
            echo '</div>';
        }
        ?>
    </div>

    <div id="aside" class="floatleft">
        <div id="anexo1">
        </div>

        <div id="anexo2">
            <select
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
