
<h3>SE SUBIO BARBARO!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<img src="<?php echo '../revista/' . $upload_data["file_name"]?>"/>
<p><?php echo anchor('', 'Upload Another File!'); ?></p>
