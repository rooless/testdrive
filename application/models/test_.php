<?php
class Testing extends CI_Model {

	function create ($name) {

       $data = array(
				'datecreate' =>  date("Y-m-d G:i:s"),
				'name' => $name
            );
        $this->db->insert('test', $data);
		$this->db->select_max('id');
		$query = $this->db->get('test');
		$row = $query->row();
		$idtest = $row->id;
		
		$this->id = $idtest;
		$this->name = $name;
		
		
		$this->load->view('header');
		$this->load->view('container');
		$this->load->view('menu');
		$this->load->view('admin\question', $this);
   }
   
   
}
?>