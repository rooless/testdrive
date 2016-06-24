<?php
class Testing extends CI_Model {

	function create ($name, $group) {

       $data = array(
				'datecreate' =>  date("Y-m-d G:i:s"),
				'name' => $name,
				'view' => 0,
				'group_id' => $group
            );
        $this->db->insert('test', $data);
		$this->db->select_max('id');
		$query = $this->db->get('test');
		$row = $query->row();
		$idtest = $row->id;
		//$nametest = $row->name;
		
		//$data->id = $idtest;
		//$data->name = $nametest;
		
		$this->session->set_userdata('idtest',$idtest);
		$this->session->set_userdata('nametest', $name);
		
		
		/*$this->load->view('header');
		$this->load->view('container');
		$this->load->view('admin/menu');
		$this->load->view('admin/question');*/
   }
   
   function create_group ($name) {

       $data = array(
				'datecreate' =>  date("Y-m-d G:i:s"),
				'name' => $name,
				'view_group' => 0
            );
        $this->db->insert('tsgroup', $data);
		$this->db->select_max('id');
		$query = $this->db->get('tsgroup');
		$row = $query->row();
		$idtest = $row->id;

   }
   
   function delete_test($id)
   {
	   $this->db->query("DELETE test,question,answer 
			FROM test 
			LEFT JOIN question ON test.id = question.test_id
			LEFT JOIN answer ON question.id = answer.question_id 
			WHERE test.id ='$id' 
		");
   }
   
   function delete_group($id)
   {
	   $this->db->query("DELETE tsgroup, test,question,answer 
			FROM tsgroup
      LEFT JOIN test ON tsgroup.id = test.group_id 
			LEFT JOIN question ON test.id = question.test_id
			LEFT JOIN answer ON question.id = answer.question_id 
			WHERE tsgroup.id ='$id'");
   }
   
   function view_test($id)
   {
	   /*
	   * Выводит данные по одному тесту
	   */
	   
	   $this->db->where('id', $id);
	   $query=$this->db->get('test');
	   return $query->row();
   }
   
   function noview($id)
   {
	   $data = array(
		'view'=>1
	   );
	   $this->db->where('id', $id);
	   $this->db->update('test', $data);
   }
   
    function view($id)
   {
	   $data = array(
		'view'=>0
	   );
	   $this->db->where('id', $id);
	   $this->db->update('test', $data);
   }
   
  
   //function view_group()
   function getgroup()
   {
	   $query = $this->db->query('SELECT tsgroup.id, tsgroup.name, COUNT(test.id) AS cnt, tsgroup.view_group
  FROM tsgroup LEFT JOIN test ON tsgroup.id = test.group_id
  GROUP BY tsgroup.id ');
	  /* $this->db->select('id, name, view_group');
	   $this->db->from('tsgroup');
	   $query = $this->db->get();*/
	   if ($query->num_rows() > 0){
		   return $query;
	   } else return 0;
   }
   
   
   //function view_full_test(){
   function viewtestofgroup($id){		
	   /*
		*	Выводит список всех тестов
		*	$id - id группы
	   */
	   $this->db->select('id,name, view');
	   $this->db->from('test');
	   $this->db->where('group_id', $id);
	   
	   if($this->session->userdata('profile') == 0){
		    $this->db->where('view', 0);
	   }
	  
	   $query = $this->db->get();
	   if ($query->num_rows() > 0){
		   return $query;
	   } else return 0;
	   
	   
	   /*foreach ($query->result() as $row)
		{
			$this->id = $row->id;
			$this->name = $row->name;
			
			
						
			$this->load->view("admin/view_full_test", $this);
			
		}	*/	
   }
   
   function getmaxquestioncode($id)
   {
	   $query=$this->db->query(" SELECT max(question.code) as maxcode FROM question WHERE question.test_id = '$id' ");
	   return $query->row();
   }
   
   function count_question($id){
	   /*
		*	Выводит количество вопросов по выбранному тесту
	   */
	   //$this->db->select('question.id as qid, question.code as qcode, question.name as qname, question.type, answer.id as aid, answer.code as acode, answer.name as aname, answer.richtig');
	   $this->db->select("question.id as qid, question.code as qcode, question.name as qname, question.type");
	   $this->db->from('question');
	   $this->db->where('test_id', $id);
	   $query = $this->db->get();
	   
	   return $query->num_rows();
   }
   
   function getListUser($id)
   {
	   $query = $this->db->query("SELECT users.id, users.lastname, users.firstname, users.patrname 
			FROM result_test LEFT JOIN users ON result_test.user_id = users.id
			WHERE result_test.test_id='$id'
			GROUP BY result_test.user_id");
		//$query = $this->db->get();
		//return $query->result();
		return $query;
  
   }
   
   function getCountUser($id)
   {
	   
   }
   
   function view_question($id){
	   /*
		*	Выводит список вопросов по выбранному тесту
	   */
	   //$this->db->select('question.id as qid, question.code as qcode, question.name as qname, question.type, answer.id as aid, answer.code as acode, answer.name as aname, answer.richtig');
	   $this->db->select("question.id as qid, question.test_id, question.code as qcode, question.name as qname, question.type");
	   $this->db->from('question');
	   //$this->db->join('answer', 'answer.question_id = question.id', 'inner');
	   $this->db->where('test_id', $id);
	   $query = $this->db->get();
	   
	   return $query->result();
	}
   
   function pageListUser($id_test, $page, $countres)
   {
	   //echo $countres;
	   
	   //$query= $this->db->get_where('result_test', array('test_id' => $id_test), $page, $countres);
	   
	   $query=$this->db->query("SELECT users.id, users.lastname, users.firstname, users.patrname 
			FROM result_test LEFT JOIN users ON result_test.user_id = users.id
			WHERE result_test.test_id='$id_test'
			group by result_test.user_id
			LIMIT $countres, $page ");
			
			
	return $query->result();
   }
   
   function setquestion($id, $page, $countres, $total){
	   $this->db->where('test_id', $id);
	   $this->db->order_by('id');
	   $this->db->limit($countres, $page);
	   $query = $this->db->get('question');
	  return $query->result_array();
   }
   
   function setanswers($id){
	   $this->db->where('question_id', $id);
	   $query = $this->db->get('answer');
	   return $query->result_array();
   }
   
   function setResult($user_id, $test_id, $question_id, $answer){
	   $this->db->query("INSERT INTO result_test(user_id, test_id, question_id, answer_id) VALUES ('$user_id', '$test_id', '$question_id', '$answer') ");
   }
   
    function view_answer($id){
	   $this->db->select('id, code, name, richtig');
	   $this->db->from('answer');
	   $this->db->where('question_id', $id);
	   $query = $this->db->get();
	   
	   return $query->result();
	   
	   //$this->load->view("admin/footer_answer");
   }
   
   function getQuestion($id){
	   $this->db->select('*');
	   $this->db->from('question');
	   $this->db->where('test_id', $id);
	   $query = $this->db->get();
	   return $query->result();
   }
   
   function deleteQuestion($id)
   {
	   $this->db->query("DELETE question,answer 
		FROM question 
		LEFT JOIN answer ON question.id = answer.question_id 
		WHERE question.id ='$id' ");
   }
   
   function getAnswer($id){
	   $this->db->select('*');
	   $this->db->from('answer');
	   $this->db->where('question_id', $id);
	   $queryAnswer = $this->db->get();
	   return $queryAnswer->result();
   }
   
   function setAnswer(){
	   $data = array(
			'user_id' => $this->session->userdata('id'),
			'test_id' => $this->session->userdata('idtest'),
			'question_id' => $this->session->userdata('idquestion'),
			'answer_id' => '233'
	   );
	   
	   $this->db->insert('result_test', $data);
   }
   
   function getResult($user, $test, $idans)
   {
	   $query=$this->db->query("SELECT answer.name as aname, answer.richtig
  FROM question INNER JOIN answer ON question.id = answer.question_id
  INNER JOIN result_test ON result_test.answer_id = answer.id
  WHERE result_test.user_id='$user' AND result_test.test_id='$test' AND result_test.question_id = '$idans' ");
			
		return $query->result();
   }
   
   function getLastTest()
   {

   }
}
?>