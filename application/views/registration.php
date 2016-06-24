<?php $this->load->view('header'); ?>

	 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
								<input type="text" class="form-control" id="inputlastname" name="lastname" placeholder="Фамилия" value="<?php echo set_value('lastname'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputfirstname" class="col-sm-2 control-label">Имя</label>
							<div class="col-sm-8">
								<?php echo form_error('firstname'); ?>
								<input type="text" class="form-control" id="inputfirstname" name="firstname" placeholder="Имя" value="<?php echo set_value('firstname'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputpatrname" class="col-sm-2 control-label">Отчество</label>
							<div class="col-sm-8">
								<?php echo form_error('patrname'); ?>
								<input type="text" class="form-control" id="inputpatrname" name="patrname" placeholder="Отчество" value="<?php echo set_value('patrname'); ?>">
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
									<input type="text" class="form-control" id="inputlogin" name="login" placeholder="Логин" value="<?php echo set_value('login'); ?>">
								</div>
						</div>		
						
					
					<div class="form-group">
							<label for="inputpassword" class="col-sm-2 control-label">Пароль</label>
							<div class="col-sm-4">
								<?php echo form_error('pass1'); ?>
								<input type="password" class="form-control" id="inputpassword" name="pass1" placeholder="Пароль" value="<?php echo set_value('pass1'); ?>">
							</div>
							<div class="col-sm-4">
								<?php echo form_error('pass2'); ?>
								<input type="password" class="form-control" id="inputpassword" name="pass2" placeholder="Ещё раз">
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
	
</div>  
<?php
$this->load->view('footer');
?>

<script>
$('#inputlogin').blur(function(){
	var login = $('#inputlogin').val();
	//alert(login);
	$.post('/testdrive/users/check_login/'+login, function( data ){
		$(".error").html(data);
	});	
});

$('.btn-default').click(function(){
	
});
</script>