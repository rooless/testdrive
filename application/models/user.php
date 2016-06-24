<?php
class User extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	
	function create_user ($lastname, $firstname, $patrname, $post, $speciality, $login, $password) {

       $data = array(
				'datecreate' =>  date("Y-m-d G:i:s"),
				'lastname' => $lastname,
				'firstname' => $firstname,
				'patrname' => $patrname,
				'rbpost_id' => $post,
				'rbspeciality_id' => $speciality,
				'login' => $login,
				'password' => $password
            );
        $this->db->insert('users', $data);
		/*$this->load->view('header');
		$this->load->view('auth');
		  //$this->load->view('form_registration');
		$this->load->view('footer');*/
   }
   
   function check_login($login)
   {
	   $this->db->select('login');
	   $this->db->from('users');
	   $this->db->where('login', $login);
	   $query = $this->db->get();
	   return $query->num_rows();
   }
   
   function check_user($login,$pass){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('login', $login);
		$this->db->where('password', $pass);
		$query=$this->db->get();
		
		if ($query->num_rows() == 1){
			$row = $query->row();
			return $row;
		} else return 0;
			
    } 
}
?>