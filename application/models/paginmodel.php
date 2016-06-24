<?php
class Paginmodel extends CI_Model {

	function counttest(){
		$query = $this->db->get('test');
		return $query->num_rows();
	}
	
	function getnametest($num, $offset){
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('test', $num, $offset);
		return $query->result_array();
	}
}
?>