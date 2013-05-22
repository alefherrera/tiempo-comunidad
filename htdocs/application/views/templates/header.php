<html>
    <head>
        <title><?php echo $title ?></title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="/styles/style.css" rel="stylesheet" type="text/css"/>
        <!--webfontsgoogle-->
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic' rel='stylesheet' type='text/css'>
        <!--webfontsgoogleEND-->

        <!--log in script-->
        <script type="text/javascript" src="/scripts/jquery-1.9.1.min.js"></script>
        <script src="/scripts/login.js"></script>
        <!--log in script END-->

    </head>
    <body>
        <div id="wrapper">
            <div id="wrapper2">
                <header>
                    <div id="principal">
                        <div id="logo" class="floatleft">
                            <a href="/index.php"> <img src="/images/index/bannerlogo.gif"/></a>
                        </div>

                        <div id="slogan" class="floatleft">	<p>"El futuro es nuestro</p> 
                            <p>por prepotencia de trabajo"<span> Roberto Arlt</span></p>
                        </div>

                        <div id="clima" class="floatleft">
                            <div id="TT_tCq1k11EE88cWcGUKfqjjjDDztlU1Yc2bYkYEZyIKkj"><h2><a href="http://www.tutiempo.net">Clima en el mundo</a></h2></div>
                            <script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_tCq1k11EE88cWcGUKfqjjjDDztlU1Yc2bYkYEZyIKkj"></script>
                        </div>

                        <div id="datosrevista" class="floatleft">
                            <p>Director: Morán José María</p>
                            <p>info@revistatiempo.com.ar</p>
                            <p>Tel/Fax: (011) 4756 - 0385</p>
                            <div id="sociales">
                                <a id="facebook" href="#" class="floatleft">tiempo facebook </a>
                                <a id="twitter" href="#" class="floatleft">tiempo twitter </a>

                                <div id="loginContainer" class="floatleft">
                                    <a href="#" id="loginButton" class="<?php if($usuario != false) echo 'logueadoButton'; else echo 'nologueadoButton';?>"><span>Login</span><em></em></a>
                                    <div style="clear:both"></div>
                                    
                                    <div id="loginBox" <?php if(isset($error_login)) echo 'style="display:inline"'; ?>>     
                                        <?php
                                        $atributos = array('id' => 'loginForm');
                                        if ($usuario != false):
                                            echo form_open('revista/logout', $atributos); ?>
                                            <fieldset id="body">
                                                <div id="usuariologueado" class="floatleft"> <?php echo  $usuario['nombre_usuario']; ?></div>
                                            <?php echo form_open('revista/logout'); ?>
                                                <input type="submit" id="login3" name="submit" value="Desloguear"/>
                                            </fieldset>
                                        <?php else:
                                            echo form_open('revista/login', $atributos) ?>
                                        <fieldset id="body">
                                            <?php if (isset($error_login)): ?>
                                                <div class="error"> <?php echo $error_login ?> </div>
                                            <?php endif ?>
                                            <fieldset>
                                                <label for="usuario">Usuario</label> 
                                                <input type="input" value="<?php echo $this->input->post('usuario')?>"  name="usuario" id="usuario" />
                                            </fieldset>
                                            <fieldset>
                                                <label for="password">Contraseña</label>
                                                <input type="password" name="password" />
                                            </fieldset>
                                            <input type="submit" name="submit" id="login2" value="Ingresar" />
                                            <label for="checkbox"><input type="checkbox" id="checkbox" name="recordar"/>Recuérdame</label>
                                        </fieldset>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="botonera" class="clearboth">
                        <nav>   <ul>
                                <li><a href="/index.php/quienes">QUINES SOMOS</a> </li>
                                <li><a href="/index.php/revista">EDICIÓN IMPRESA</a> </li>
                                <li><a href="/index.php/notas">NOTAS </a> </li>
                                <li><a href="/index.php/utiles">ÚTILES </a> </li>
                                <li><a href="/index.php/anunciantes">ANUNCIANTES </a> </li>
                                <li><a href="/index.php/contacto">CONTÁCTENOS </a> </li>
                                <!--<li><img src="/images/index/promo_prueba.gif"/></li>-->
                            </ul></nav>
                    </div>
                    <div class="clearboth"/>
                </header>
                

                </form>
