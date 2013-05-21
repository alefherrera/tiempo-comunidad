

<div id="contenido">
    <div id="contenido1" class="floatleft" style="word-wrap: break-word;">
        <?php if ($cantidad == 0 || sizeof($notas) == 0 || $notas == false): ?>
            <p> No hay datos para mostrar </p>
            <?php
        else:
            foreach ($notas as $nota) {
                ?>
                <div>
                    <p><a href='/index.php/nota/<?php echo $nota['idnota'] ?>'><?php echo $nota['titulo'] ?></a> por <?php echo $nota['autor']; ?> - <?php echo $nota['fecha_alta']; ?></p> 
                    <p><?php echo $nota['contenido'] ?></p>
                </div>

            <?php } ?>
            <div id="numeros">
                <ul>
                    <li style="float:left; margin-right: 10px;">
                        <?php if ($pagina != 1): ?>
                            <a href='/index.php/notas/1' style="text-decoration:underline"><<</a>
                        <?php else: ?>
                            <<
                        <?php endif ?>
                    </li>
                    <li style="float:left; margin-right: 10px;">
                        <?php if ($pagina != 1): ?>
                            <a href='/index.php/notas/<?php echo ($pagina - 1) ?>' style="text-decoration:underline"> < </a>
                        <?php else: ?>
                            <
                        <?php endif ?>
                    </li>
                    <?php for ($i = 0; $i < sizeof($numeros); $i++): ?>
                        <li style="float:left; margin-right: 10px;">
                            <a href='/index.php/notas/<?php echo $numeros[$i] + 1 ?>' style="text-decoration:underline; <?php
                            if ($i == $pagina - 1) {
                                echo 'background-color:red';
                            }
                            ?>"><?php echo $numeros[$i] + 1 ?></a>
                        </li>
                    <?php endfor ?>
                    <li style="float:left; margin-right: 10px;">
                        <?php if ($pagina != $ultima_pagina): ?>
                            <a href='/index.php/notas/<?php echo ($pagina + 1) ?>' style="text-decoration:underline;">></a>
                        <?php else: ?>
                            >
                        <?php endif ?>
                    </li>
                    <li style="float:left; margin-right: 10px;">
                        <?php if ($pagina != $ultima_pagina): ?>
                            <a href='/index.php/notas/<?php echo $ultima_pagina ?>' style="text-decoration:underline">>></a>
                        <?php else: ?>
                            >>
                        <?php endif ?>
                    </li>
                </ul>
            </div>
        <?php endif ?>
            <div class="clearboth"></div>
        <?php if ($usuario != false && $usuario['idnivel'] < 2): ?>
            <div id="formulario" >
                <?php echo form_open_multipart('do_upload') ?>
                <div>
                    <label for="titulo">Titulo *</label>
                </div>
                <div>
                    <input type="text" name="titulo" maxlength="45" value="<?php if (isset($titulo_form)) echo $titulo_form ?>"/>
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
                    <input type="text" name="autor" maxlength="45" value="<?php if (isset($autor_form)) echo $autor_form ?>"/>
                </div>
                <div>
                    <label for="contenido">Contenido *</label>
                </div>
                <div>
                    <textarea name="contenido" maxlength="65000" rows="10"></textarea>
                </div>
                <input id="botonconfrev" type="submit" value="Confirmar" />
                </form>
                <div>
                    Los campos con "*" son obligatorios.
                </div>
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