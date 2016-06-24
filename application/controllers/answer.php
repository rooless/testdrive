<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answer extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function create_single(){
		$this->countans = $this->session->userdata('countans');
		//$this->idquestion = $_POST['idquestion'];
		$this->idquestion = $this->session->userdata('idquestion');
		$this->answer = $_POST['answer'];
		$this->name = $_POST['nameanswer'];

		$this->load->model('answermodel');
		for ( $i=0; $i < $this->countans; $i++ ){
			foreach($this->answer as $key=>$value){
				if ($value == $i){
				$richtig = 1;
			} else $richtig=0;
			}
			$this->answermodel->create($this->idquestion, $i, $this->name[$i], $richtig);
		}
				
		$this->load->view('header');
		$this->load->view('admin/menu');
		
		$query=$this->answermodel->getAnswer();
		
		$this->load->view("admin/header_test");
		
		foreach ($query->result() as $row)
		{
			$this->code = $row->code;
			$this->name = $row->name;
			$this->richtig = $row->richtig;
			
			$this->load->view("admin/answer", $this);
			
		}		
		$this->load->view("admin/footer_test");
		$this->load->view('admin/end');
		
		$this->load->view("footer");
	}
	
	public function create_multiple(){
		//$this->countans = $_POST['countans'];
		//$this->idquestion = $_POST['idquestion'];
		$this->idquestion = $this->session->userdata('idquestion');
		$this->answer = $_POST['answer'];
		$this->name = $_POST['nameanswer'];

		$this->load->model('answermodel');
			foreach($this->name as $key=>$value){
				//echo ' Ключ: ' . $key;
				//echo ' Value: ' . $value;
				if (in_array($key, $this->answer)){
					$richtig = 1;
				} else $richtig=0;
				$this->answermodel->create($this->idquestion, $key, $value, $richtig);				
			}
		$this->load->view('header');
		$this->load->view('container');
		$this->load->view('admin/menu');
		
		$this->answermodel->getAnswer();
	}
}
?>