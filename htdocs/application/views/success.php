<?php echo $redireccion;
?>
<div>
Formulario subido exitosamente!<br/><br/>

Vas a ser redirijido automáticamente, si no sucede <a href="<?php echo $redireccion ?>">Click Aquí</a>
</div>
<script>setTimeout("window.location.replace('<?php echo $redireccion ?>')",3000);</script>