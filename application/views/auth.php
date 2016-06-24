<script type="text/javascript">
	$(document).ready(function(){
		$('.launch-modal').click(function(){
			$('#myModal').modal({
				backdrop: 'static',
				keyboard: true
			});
		}); 
	});
</script>


<form class="form-signin" action="/testdrive/users/checkin" method="POST">
	<h2 class="form-signin-heading">Вход</h2>
	<div class="input-prepend">
		<span class="add-on glyphicon glyphicon-user"></span>
		<input id = "prependedInput" type="text" class="input-block-level span2" name="log" placeholder="Логин">
	</div>
	<div class="input-prepend">
		<span class="add-on glyphicon glyphicon-lock"></span>
		<input id = "prependedInput" type="password" class="input-block-level span2" name="password" placeholder="Пароль">
	</div>
	
	<button class="btn btn-small btn-primary" type="submit" title="Вход">Вход</button>
	<button type="button" class="btn btn-success btn-primary btn-small launch-modal" title="Регистрация"><span class="glyphicon glyphicon-pencil"></span></button>
</form>
	
	 <!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
<div class="modal fade" id="myModal" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Регистрационная форма</h4>
			</div>
			<form class="form-horizontal" role="form" action="users/registration" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label for="inputlastname" class="col-sm-2 control-label">Фамилия</label>
							<div class="col-sm-8">
								<?php echo form_error('lastname'); ?>
								<input type="text" class="form-control" id="inputlastname" name="lastname" placeholder="Фамилия" required value="<?php echo set_value('lastname'); ?>">
							</div>
					</div>
					<div class="form-group">
						<label for="inputfirstname" class="col-sm-2 control-label">Имя</label>
						<div class="col-sm-8">
							<?php echo form_error('firstname'); ?>
							<input type="text" class="form-control" id="inputfirstname" name="firstname" placeholder="Имя" required value="<?php echo set_value('firstname'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputpatrname" class="col-sm-2 control-label">Отчество</label>
						<div class="col-sm-8">
							<?php echo form_error('patrname'); ?>
							<input type="text" class="form-control" id="inputpatrname" name="patrname" placeholder="Отчество" required value="<?php echo set_value('patrname'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputpost" class="col-sm-2 control-label">Должность</label>
						<div class="col-sm-8">
							<?php echo form_error('post'); ?>
							<select class="form-control" id="inputpost" name="post" placeholder="Должность">
							  <option></option>
							  <option value="1">Преподаватель</option>
							  <option value="2">Студент</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputspeciality" class="col-sm-2 control-label">Специальность</label>
						<div class="col-sm-8">
							<?php echo form_error('speciality'); ?>
							<select class="form-control" id="inputspeciality" name="speciality" placeholder="Специальность">
							  <option></option>
							  <option value="1">Экономика</option>
							  <option value="2">Информатика</option>
							</select>
						</div>
					</div>
						
					<div class="error"></div>
												
					<div class="form-group">
						<label for="inputlogin" class="col-sm-2 control-label">Логин</label>
							<div class="col-sm-8">
								<?php echo form_error('login'); ?>
								<input type="text" class="form-control" id="inputlogin" name="login" placeholder="Логин" required value="<?php echo set_value('login'); ?>">
							</div>
					</div>		
						
					<div class="errorpass"></div>
					<div class="form-group">
							<label for="inputpassword" class="col-sm-2 control-label">Пароль</label>
							<div class="col-sm-4">
								<?php echo form_error('pass1'); ?>
								<input type="password" class="form-control" id="inputpassword1" name="pass1" placeholder="Пароль" required value="<?php echo set_value('pass1'); ?>">
							</div>
							<div class="col-sm-4">
								<?php echo form_error('pass2'); ?>
								<input type="password" class="form-control" id="inputpassword2" name="pass2" required placeholder="Ещё раз">
							</div>
						</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" name="submit" class="btn btn-default">Сохранить изменения</button>
				</div>
				</form>
			</div>
		</div> 
	</div> 

<script>
$('#inputlogin').blur(function(){
	var login = $('#inputlogin').val();
	//alert(typeof login);
	if (login === ""){
		$(".error").html("<p style='color:red; '>Укажите логин.</p>");
		delete login;
	} else {
		$.post('/testdrive/users/check_login/'+login, function( data ){
			$(".error").html(data);
		});	
	}
	//alert(login);
	//alert(login);
	
});

$('#inputpassword2').blur(function(){
	var pass1 = $("#inputpassword1").val();
	var pass2 = $("#inputpassword2").val();
	if (pass1 != pass2){
		$(".errorpass").html("<p style='color:red; '>Пароли не совпадают.</p>");
	}
});
</script>

	