<?php
class AnswerModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	
	function create ($idquestion, $i, $name, $answer) {

       $data = array(
				'question_id' =>  $idquestion,
				'code' => $i,
				'name' => $name,
				'richtig' => $answer
            );
        $this->db->insert('answer', $data);
		
   }
   
   function getAnswer(){
	   //echo $model;
		$this->db->select('answer.code, answer.name, answer.richtig');
		$this->db->from('answer');
		$this->db->join('question', 'answer.question_id = question.id', 'inner');
		$this->db->join('test', 'question.test_id = test.id' , 'inner');
		$this->db->where('test.id', $this->session->userdata('idtest'));
		$this->db->where('question.id', $this->session->userdata('idquestion'));
		return $this->db->get();
		//print_r($query);
   }
}
?>