<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function createtest(){
		$this->load->view('header');
		$this->load->view('container');
		$this->load->view('admin/menu');
		$this->load->view('admin/header_createtest');
		$this->load->model('testing');
		$gr = $this->testing->getgroup();
		if (is_object($gr)){
			$row = $gr->result_array();
			foreach($row as $key=>$val)
			{
				$this->load->view('admin\listgroup', $val);
			}
		} 
		$this->load->view('admin/create_test');
	}
	
	public function creategroup(){
		$this->load->view('header');
		$this->load->view('admin/menu');
		$this->load->view('admin/create_group');
		$this->load->view('footer');
	}
	
	public function viewer(){
		$this->load->view('header');
		$this->load->view('container');
		$this->load->view('admin/menu');
		
		$this->load->model("testing");
		//$this->testing->view_question();
		$this->testing->view_test();
		
		//$this->load->view('admin/view_test');
	}
	
	public function viewer_result(){
		
	}
	
	public function import(){
		
	}
	
	public function export(){
		
	}
	
	public function update(){
		
	}
		
		
}
?>