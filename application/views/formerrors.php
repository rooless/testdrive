<?php 
$this->load->view('header');

echo $this->form_validation->error_string();

?>

<p><?php echo anchor('/', 'Вернуться к авторизации'); ?></p>
<?php $this->load->view('footer'); ?>