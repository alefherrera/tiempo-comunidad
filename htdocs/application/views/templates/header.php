<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><?php echo $title ?></title>
        <link href="/styles/style.css" rel="stylesheet" type="text/css"/>
        <!--webfontsgoogle-->

        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic' rel='stylesheet' type='text/css'>
            <!--webfontsgoogleEND-->

            <!--log in script-->
            <script type="text/javascript" src="/scripts/jquery-1.9.1.min.js"></script>
            <script src="/scripts/login.js"></script>
            <link rel="shortcut icon" href="/images/index/icon.png">
                <!--log in script END-->

                </head>
                <body>
                    <div id="top">
                        <div id="topinfo">
                            <h5 id="mensual" class="floatleft">TIEMPO DE LA COMUNIDAD ||<span> "El futuro es nuestro por prepotencia de trabajo"- Roberto Arlt</span> || Revista Mensual</h5>

                            <div id="toplinks" class="floatright">
                                <h5 id="fecha" class="paddingsociales"></h5>
                                <a id="facebook" class="paddingsociales" href="https://www.facebook.com/tiempodelacomunidad"><img src="/images/index/light-facebook.png"/></a>
                                <a id="twitter" class="paddingsociales"  href="https://twitter.com/tiempodelacomun" ><img src="/images/index/light-twitter.png"/></a>
                                <a href="#" id="loginButton" class="<?php
                                if ($usuario != false)
                                    echo 'logueadoButton';
                                else
                                    echo 'nologueadoButton';
                                ?>"></a>                                                
                                <div id="loginContainer">
                                    <div id="loginBox" <?php if (isset($error_login)) echo 'style="display:inline"'; ?>>     
                                        <?php
                                        $atributos = array('id' => 'loginForm');
                                        if ($usuario != false):
                                            echo form_open('revista/logout', $atributos);
                                            ?>
                                            <fieldset id="loginBody">
                                                <div id="usuariologueado" class="floatleft"> <?php echo $usuario['nombre_usuario']; ?></div>
                                                <?php echo form_open('revista/logout'); ?>
                                                <input type="submit" class="loginButton" name="submit" value="Desloguear"/>
                                            </fieldset>
                                            <?php
                                        else:
                                            echo form_open('revista/login', $atributos)
                                            ?>
                                            <fieldset id="loginBody">
                                                <?php if (isset($error_login)): ?>
                                                    <div class="error"> <?php echo $error_login ?> </div>
                                                <?php endif ?>
                                                <fieldset>
                                                    <label for="usuario">Usuario</label> 
                                                    <input type="input" value="<?php echo $this->input->post('usuario') ?>"  name="usuario" id="usuario" />
                                                </fieldset>
                                                <fieldset>
                                                    <label for="password">Contraseña</label>
                                                    <input type="password" name="password" />
                                                </fieldset>
                                                <input type="submit" name="submit" class="loginButton" value="Ingresar" />

                                                <div id="recuerdame">
                                                    <input type="checkbox" id="checkbox" name="recordar"/>
                                                    <label for="checkbox">Recuérdame</label>
                                                </div>
                                            </fieldset>
                                        <?php endif ?>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="clearboth"></div>
                        </div><!--top info end-->
                    </div> <!--TOP END-->


                    <div id="wrapper">

                        <div id="header">
                            <div class='contenido'>
                                <a  href="/index.php"> <img class="floatleft" src="/images/index/tiempologochico2.png"/></a>
                                <div id="botonera">
                                    <nav>   <ul>

                                            <li><a class="borizq" href="/quienes">QUIENES SOMOS</a> </li>
                                            <li><a href="/revista">EDICIÓN IMPRESA</a> </li>
                                            <li><a href="/notas">NOTAS </a> </li>
                                            <li><a href="/utiles">ÚTILES </a> </li>
                                            <li><a href="/anunciantes">ANUNCIANTES </a> </li>
                                            <li><a href="/contacto">CONTÁCTENOS </a> </li>
                                            <!--<li><img src="/images/index/promo_prueba.gif"/></li>-->
                                        </ul></nav>
                                </div>
                                <div class="clearboth"></div>
                            </div>
                        </div>
                        <div id='body'>
