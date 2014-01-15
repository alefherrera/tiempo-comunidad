<?php
    if(!isset($rubro_form))
    {
        $rubro_form = 0;
    }
?>
<select name="rubro">
    <option value="0">SELECCIONE</option>
    <?php
    foreach ($rubros as $row) {
        ?>
        <option value="<?php echo $row['idrubros'] ?>" <?php if ($row['idrubros'] == $rubro_form) echo 'selected' ?>>
         <?php echo $row['rubro'] ?>
        </option>
    <?php } ?>
</select>


