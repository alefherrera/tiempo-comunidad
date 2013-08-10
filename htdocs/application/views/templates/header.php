<html>
    <head>
        <title><?php echo $title ?></title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
            <h5 id="mensual">TIEMPO DE LA COMUNIDAD || Revista Mensual</h5>
            
            <div id="toplinks" class="floatright">
            <div id="sociales" class="floatright">
                               
                                <a id="facebook" class="paddingsociales" href="#"><img src="/images/index/light-facebook.png"/></a>
                                <a id="twitter" class="paddingsociales"  href="#" ><img src="/images/index/light-twitter.png"/></a>
                                <div id="loginContainer">
                                  
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
            </div><!--top info end-->
        </div> <!--TOP END-->
        
        
        <div id="wrapper">
           
                <header>
                    <div id="principal">
                            <div id="logo" class="floatleft">
                                <a href="/index.php"> <img src="/images/index/tiempologochico2.png"/></a>
                            </div>
                   
                            <div id="botonera" class="clearboth">
                                <nav>   <ul>

                                        <li><a id="borizq" href="/index.php/quienes">QUIENES SOMOS</a> </li>
                                        <li><a href="/index.php/revista">EDICIÓN IMPRESA</a> </li>
                                        <li><a href="/index.php/notas">NOTAS </a> </li>
                                        <li><a href="/index.php/utiles">ÚTILES </a> </li>
                                        <li><a href="/index.php/anunciantes">ANUNCIANTES </a> </li>
                                        <li><a id="border" href="/index.php/contacto">CONTÁCTENOS </a> </li>
                                        <!--<li><img src="/images/index/promo_prueba.gif"/></li>-->
                                    </ul></nav>
                            </div>
                       
                    </div>

                   
                    <div class="clearboth"><div/>
                </header>
                

                </form>
