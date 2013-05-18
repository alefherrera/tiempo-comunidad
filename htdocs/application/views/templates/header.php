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
                                    <a href="#" id="loginButton"><span>Login</span><em></em></a>
                                    <div style="clear:both"></div>
                                    
                                    <div id="loginBox" <?php if(isset($error_login)) echo 'style="display:inline"'; ?>>     
                                        <?php
                                        $atributos = array('id' => 'loginForm');
                                        if ($usuario != false) {

                                            echo form_open('revista/logout', $atributos);
                                            echo '<fieldset id="body">';
                                            echo $usuario['nombre_usuario'];
                                            echo form_open('revista/logout') . '
                                                <input type="submit" id="login2" name"submit" value="Desloguear"/>
                                            </fieldset>';
                                        } else {
                                            echo form_open('revista/login', $atributos) . '
                                        <fieldset id="body">';
                                            if (isset($error_login))
                                                echo '<div id="error">' . $error_login . '</div>';
                                            echo '
                                            <fieldset>
                                                <label for="usuario">Usuario</label> 
                                                <input type="input" value="' . $this->input->post('usuario') . '"  name="usuario" id="usuario" />
                                            </fieldset>
                                            <fieldset>
                                                <label for="password">Contraseña</label>
                                                <input type="password" name="password" />
                                            </fieldset>

                                            <input type="submit" name="submit" id="login2" value="Ingresar" />
                                            
                                            <label for="checkbox"><input type="checkbox" id="checkbox" name="recordar"/>Recuérdame</label>
                                        </fieldset>';
                                        }
                                        ?>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="botonera" class="clearboth">
                        <nav>   <ul>
                                <li><a href="#">LA REVISTA </a> </li>
                                <li><a href="#">NOTICIAS </a> </li>
                                <li><a href="#">ÚTILES </a> </li>
                                <li><a href="#">ANUNCIANTES </a> </li>
                                <li><a href="/index.php/contacto">CONTÁCTENOS </a> </li>
                                <li><img src="/images/index/promo_prueba.gif"/></li>
                            </ul></nav>
                    </div>

                </header>


                </form>
