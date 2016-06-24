<?php
class QuestionModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	
	function create ($idtest, $num, $name, $level, $mark, $type, $count) {
		
		if($level == null){
			$level=0;
		}
		
		if($mark == null){
			$mark=0;
		}

       $data = array(
				'test_id' =>  $idtest,
				'code' => $num,
				'name' => $name,
				'level' => $level,
				'mark_id' => $mark,
				'type' => $type
            );
        $this->db->insert('question', $data);
		
		$this->db->select_max('id');
		$this->db->select('code, name');
		$query = $this->db->get('question');
		$row = $query->row();
		$idquestion = $row->id;
		$codequestion = $row->code;
		$namequestion = $row->name;
		
		
		//$this->countans = $count;
		
		$this->session->set_userdata('idquestion', $idquestion);
		$this->session->set_userdata('numquestion', $codequestion);
		$this->session->set_userdata('namequestion', $namequestion);
		$this->session->set_userdata('countans', $count);
   }
   
   function check_user($login,$pass){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('login', $login);
		$this->db->where('password', $pass);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){
			$row = $query->row();
			//echo $row->login;
			if ($row->profile_id == 1){
				$this->load->view('header');
				$this->load->view('container');
				$this->load->view('admin\menu');
				$this->load->view('admin\panel');
				$this->load->view('footer');
			} else {
				$this->load->view('user\menu');
				$this->load->view('user\panel');
			}
			
			//echo $row->login;
		} else echo "Вход не выполнен";
    } 
}
?>