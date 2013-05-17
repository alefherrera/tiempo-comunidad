<html>
<head>
    <title><?php echo $title ?></title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="/jquery/jquery-1.9.1.min.js">
    </script>
</head>
<body>
    <?php 
    if(isset($error_login))
        echo $error_login; 
    ?>
    
    <?php
    if($usuario != false)
      {
        echo form_open('revista/logout');
        echo $usuario['nombre_usuario'].'<br/>';
        echo  form_open('revista/logout').'
              <input type="submit" name"submit" value="Desloguear"/>';
    }else{
        echo form_open('revista/login').'

        <label for="usuario">Usuario</label> 
	<input type="input" value="'.$this->input->post('usuario').'"  name="usuario" /><br />

	<label for="password">Contraseña</label>
        <input type="password" name="password" /><br />
        <label for="recordar">Recordarme</label>
	<input type="checkbox" name="recordar"/><br/>
	<input type="submit" name="submit" value="Ingresar" />';
    }
    ?>
    </form>
