<?php 
$this->load->view('header');
?>
<div class="well">
<h3>Поздравляем! Регистрация прошла успешно. Теперь перейдите на главную и авторизуйтесь.</h3>
<p><?php echo anchor('/', 'Вернуться к авторизации'); ?></p>
</div>
<?php $this->load->view('footer'); ?>