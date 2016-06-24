<?php
if ($log == 1){
	?>
	<div class="alert alert-success">
		<p>Файл <?php echo $_FILES['loadfile']['name'];?> успешно загружен.</p>
		<p>Теперь можете перейти в меню &laquo;Главная&raquo; или продолжить загружать следующий файл.</p>
	</div>
	<?php
} else if ($log == 0){
	?>
	<div class="alert alert-danger">
		<p>Произошла ошибка <?php echo $_FILES['loadfile']['error'];?> </p>
	</div>
	<?php
} else if ($log == 3){
?>
<div class="alert alert-danger">
		<p>Документ не загружен. Проверьте документ на ошибки.</p>
	</div>
<?php
}
?>