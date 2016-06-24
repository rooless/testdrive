<p><a href="<?php echo $dir.$files;?> " title="Открыть/Сохранить файл"><?php echo $files; ?></a>
<a href="#<?php echo $files; ?>" class="deletefile"><span class="glyphicon glyphicon-trash"></span></a></p>

<script>
$('.deletefile').click(function(){
	
	var file = '<?php echo $files; ?>';
	//alert(file);
	$.post('/testdrive/test/delete_file/'+file);
});
</script>