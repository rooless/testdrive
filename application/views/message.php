<?php
	switch ($flg_message){
		case 1:
?>
		<div class="jumbotron">
			<div class="row">
				<p class="text-center" style="font-size:20px; text-align:center; color:#C0C0C0; ">Вы еще не создали ни одну группу. <br> Для создания группы перейдите в меню "Создать" и выберите раздел "Создать группу".</p>
			</div>
		</div>
		<?php
			break;
		case 2:
?>
			<p style="font-size:20px; text-align:center; color:#C0C0C0; ">Для вас еще не создано ни одного теста. Обновите страницу или зайдите позже. </p>
<?php
			break;
		case 3:
?>
			<input type="text" class="form-control" id="inputlogin">
			<span class="glyphicon glyphicon-ok form-control-feedback"></span>
<?php
			break;
		case 4:
?>
			<div class="jumbotron">
			<div class="row">
					<p class="text-center" style="font-size:20px; text-align:center; color:#C0C0C0; ">В этом разделе еще ни одного теста не создано. <br> Для создания теста перейдите в меню "Создать" и выберите "Создать тест". </p>
				</div>
		</div>
<?php
			break;		
		case 5:
?>
		<div class="jumbotron">
			<div class="row">
					<p class="text-center" style="font-size:20px; text-align:center; color:#C0C0C0; ">В этой группе еще не создано не одного теста. <br> Для создания теста перейдите в меню "Создать" и выберите "Создать тест". </p>
				</div>
		</div>
<?php
			break;
	}
?>