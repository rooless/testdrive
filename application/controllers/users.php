<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
				
		if ($this->session->userdata('logged_in') == TRUE)
		{
			if ($this->session->userdata('profile') == 1)		// если это администратор
			{
				$this->load->view('admin/menu');				
				$this->load->model("testing");
				//$res = $this->testing->view_group();
				$res = $this->testing->getgroup();
				//$res = $this->testing->view_full_test();
				if (is_object($res)){
					$row = $res->result_array();
					//$this->load->view('header_testview');
					$this->load->view('header_group');
					foreach($row as $key=>$val)
					{
						//$this->load->view('admin\testview', $val);
						$this->load->view('admin\groupview', $val);
					}
					//$this->load->view('footer_testview');
					$this->load->view('footer_groupview');
				} else {
					$this->flg_message = 1;
					$this->load->view('message', $this);
				}
				
				//$this->load->view('footer');
				//redirect('menu/viewer');
			} else if($this->session->userdata('profile') == 0)		// если это пользователь
			{
				$this->load->view('user/menu');				
				$this->load->model("testing");
				//res = $this->testing->view_full_test();
				$res = $this->testing->getgroup();
				if (is_object($res))
				{
					$row = $res->result_array();
					$this->load->view('header_testview');
					foreach($row as $key=>$val)
					{
						//$this->load->view('user\testview', $val);
						$this->load->view('user\groupview', $val);
					}
					
					$this->load->view('footer_testview');
				} else {
					$this->flg_message = 2;
					$this->load->view('message', $this);
				}
				
				
			}
		} else 
		{
			//$this->load->library('container');
			$this->load->library('form_validation');
			$this->load->view('auth');
		}
		
		$this->load->view('footer');
	}
	
	public function check_login($login)
	{
		//$this->load->view('header');
		if (isset($login)){
			$this->load->model('user');
			$cklog = $this->user->check_login($login);
			if ($cklog > 0){
				$this->flg_message = 3;
				echo "<div class='form-group has-error has-feedback'>
					<label for='inputlogin' class='col-sm-9 control-label'>Такой логин уже существует. Замените его на другой.</label>
					</div>";
			//$this->load->view('auth', $this);
			} 
		}
		/*else {
			$this->flg_message = 4;
			echo "<div class='col-sm-8'>
				<input type='text' class='form-control' id='inputlogin' name='login'>
				<span class='glyphicon glyphicon-ok form-control-feedback'></span>
				</div>";
			//$this->load->view('auth', $this);
		}*/
		//$this->load->view('footer');
	}

	
	public function registration(){		
			/**/
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_message('required', 'Поле <b>%s</b> не должно быть пустым.');
		$this->form_validation->set_message('min_length', 'Поле <b>%s</b> должно содержать от 5 до 12 символов.');
		$this->form_validation->set_message('max_length', 'Поле <b>%s</b> должно содержать от 5 до 12 символов.');
		$this->form_validation->set_message('matches', 'Пароли не совпадают.');
		$this->form_validation->set_message('alpha', 'В поле <b>%s</b> не допустимы цифры.');
		
		$this->form_validation->set_rules('login', 'Логин', 'trim|required|callback_checknik|xss_clean');
		$this->form_validation->set_rules('lastname', 'Фамилия', 'trim|required|xss_clean');
		$this->form_validation->set_rules('firstname', 'Имя', 'trim|required|xss_clean');
		$this->form_validation->set_rules('patrname', 'Отчество', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('post', 'Должность', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('speciality', 'Специальность', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pass1', 'Пароль', 'trim|required|min_length[3]|max_length[12]|matches[pass2]|xss_clean');
		$this->form_validation->set_rules('pass2', 'Повтор пароля', 'trim|required|xss_clean');
		
		/*$this->form_validation->set_fields('lastname', 'Last Name');
		$this->form_validation->set_fields('firstname', 'First Name');
		$this->form_validation->set_fields('patrname', 'Patr Name');
		$this->form_validation->set_fields('post', 'Post');
		$this->form_validation->set_fields('speciality', 'Speciality');
		$this->form_validation->set_fields('login', 'Login');
		$this->form_validation->set_fields('pass1', 'Pass1');
		$this->form_validation->set_fields('pass2', 'Pass2');*/
		
		/*$rules['lastname'] 	= "required";
		$rules['firstname'] 	= "required";
		$rules['patrname'] 	= "required";
		$rules['post'] 			= "required";
		$rules['speciality'] 	= "required";
		$rules['login'] 		= "required";
		$rules['password'] 	= "required";*/
		
		//$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE){
			//$data=$_POST;
			//$data['err']=$this->form_validation->error_string();
			//echo "Нет данных<br>";
			//echo $rules['lastname'];
			$this->load->view('formerrors');
			//$this->load->view('auth');
		}
		else
		{
			$this->lastname 	= $_POST['lastname'];
			$this->firstname		= $_POST['firstname'];
			$this->patrname 	= $_POST['patrname'];
			$this->post 			= $_POST['post'];
			$this->speciality 	= $_POST['speciality'];
			$this->login 			= $_POST['login'];
			$this->password 	= $_POST['pass1'];
			
			if ($this->post == ''){
				$this->post = null;
			}
			
			if ($this->speciality == ''){
				$this->speciality = null;
			}
			//echo $this;
			$this->load->model('user');
			$this->user->create_user($this->lastname, $this->firstname, $this->patrname, $this->post, $this->speciality, $this->login,$this->password );	
			$this->load->view('formsuccess');
		}
		
		//redirect('/');
	}
	
	public function checknik($login)
	{
		$this->load->model('user');
		$cklog = $this->user->check_login($login);
		if ($cklog > 0){
			$this->form_validation->set_message('checknik', 'Пользователь с таким Логин уже существует. ');
			return false;
			//$this->load->view('auth', $this);
		} else {
			return true;
		} 
	}
	
public function checkin()
{
	//$this->load->view('header');
	$this->login = $_POST['log'];
	$this->password = $_POST['password'];
		
	$this->load->model('user');
	$auth= $this->user->check_user($this->login, $this->password);
	//echo $auth;
	if (!is_object($auth))
	{
		redirect('/');
	} else 
	{
		$var_session = array(
			'user_id' => $auth->id,
			'login' => $auth->login,
			'logged_in' => TRUE
		);		
			// Создаем сессию с данными о пользователе { Фамилия, Имя, Отчество, Логин, профиль, вход(выполнен/не выполнен) }
		$this->session->set_userdata($var_session);			
		if ($auth->profile_id == '1'){ 			// если это администратор
				// то добавляем в сессию данные о профайле
			$this->session->set_userdata('profile', '1');
			redirect('/');
				//$this->load->view('admin\menu');
				/*	*/		
		} else { 				// если это пользователь
			$this->session->set_userdata('profile', '0');
			redirect('/');
				/*$this->load->view('user\menu');
				foreach($row as $key=>$val)
				{
					$this->session->set_userdata('test_id', $val['id']);
					$this->session->set_userdata('test_name', $val['name']);
					$this->load->view('user\testview', $val);
				}*/
		}			
			//$this->load->view('footer');
	} 
		
}
	
	public function exit_user()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
	
	//public function getlist()

}
?>