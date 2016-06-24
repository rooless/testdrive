<?php
echo form_open('users/registr');

//$name = array('lastname', 'firstname', 'patrname', 'birdthday', 'login', 'password', 'status');

$lastname = array(
	'type' => 'text',
	'name' => 'lastname',
	'size' => '40',	
	'class' => 'span2',
	'id' => 'prependedInput',
);
$firstname = array(
	'type' => 'text',
	'name' => 'firstname',
	'size' => '40',
	'class' => 'span2',
	'id' => 'prependedInput',
);
$patrname = array(
	'type' => 'text',
	'name' => 'patrname',
	'size' => '20',
	'class' => 'span2',
	'id' => 'prependedInput',
);
$birthday = array(
	'type' => 'date',
	'name' => 'birthday',
	'class' => 'span2',
	'id' => 'prependedInput',
);
$login = array(
	'type' => 'text',
	'name' => 'login',
	'class' => 'span2',
	'id' => 'inputSuccess',
);

$password = array(
	'type' => 'password',
	'name' => 'password',
	'class' => 'span2',
);
?>

<div class="input-prepend">
	<span class="add-on">Фамилия</span>
	<?php echo form_input($lastname) . "<br>"; ?>
</div>
<div class="input-prepend">
	<span class="add-on">Имя</span>
	<?php echo form_input($firstname) . "<br>"; ?>
</div>
<div class="input-prepend">
	<span class="add-on">Отчество</span>
	<?php echo form_input($patrname) . "<br>"; ?>
</div>
<div class="input-prepend">
	<span class="add-on">Дата рождения</span>
	<?php echo form_input($birthday) . "<br>"; ?>
</div>
<div class="input-prepend">
	<span class="add-on">Логин</span>
	<?php echo form_input($login);?>
</div>
<div class="input-prepend">
	<span class="add-on">Пароль</span>
	<?php echo form_input($password);?>
</div>
<div class="form-actions">
  <button type="submit" class="btn btn-primary">Регистрация</button>
  <button type="button" class="btn">Отмена</button>
</div>