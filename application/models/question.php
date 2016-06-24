<?php
class QuestionModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	
	function create ($id, $num, $name, $level, $mark, $type, $count) {

       $data = array(
				'test_id' =>  $id,
				'code' => $num,
				'name' => $name,
				'level' => $level,
				'mark_id' => $mark,
				'type' => $type
            );
        $this->db->insert('question', $data);
		
		$this->db->select_max('id');
		$query = $this->db->get('question');
		
		$this->id => $id;
		$this->name => $name;
		$this->countans => $count;
		
		$this->load->view('header');
		$this->load->view('container');
		$this->load->view('menu');
		
		if ($type == 0){
			$this->load->view('admin\answer_single', $this);
		} else ($type == 1){
			$this->load->view('admin\answer_multiple', $this);
		} else echo "Тип ответа не определен";
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