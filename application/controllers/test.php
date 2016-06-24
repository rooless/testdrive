<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function create(){
		$this->group = $_POST['group'];
		$this->name = $_POST['nametest'];
		$this->load->model('testing');
		$this->testing->create($this->name, $this->group);
		
		$this->load->view('header');
		$this->load->view('container');
		$this->load->view('admin/menu');
		$this->maxcode = 0;
		
		$this->load->view('admin/question', $this);
	}
	
	public function create_group(){
		$this->name = $_POST['namegroup'];
		$this->load->model('testing');
		$this->testing->create_group($this->name);
		
		redirect('/');
		//$this->load->view('header');
		//$this->load->view('container');
		//$this->load->view('admin/menu');
	}
	
	public function question(){
		//$this->id = $_POST['id'];
			$this->idtest = $this->session->userdata('idtest');
			$this->num = $_POST['num'];
			$this->question = $_POST['name'];
			$this->level = $_POST['level'];
			$this->mark = $_POST['mark'];
			$this->type = $_POST['optionsRadios'];
			$this->countans = $_POST['countAnswer'];
			
			$this->session->set_userdata('numquestion', $this->num);
			$this->session->set_userdata('namequestion', $this->question);
			
			$this->load->model('questionmodel');
			$this->questionmodel->create($this->idtest, $this->num, $this->question, $this->level, $this->mark, $this->type, $this->countans);
			
			$this->load->view('header');
			$this->load->view('admin/menu');
		
			if ($this->type == 1){
				//$this->load->view('admin/answer_single');
				$this->load->view('admin/answer_single', $this);
			} else if ($this->type == 2){
				$this->load->view('admin/answer_multiple', $this);
			} else echo "Тип ответа не определен";
			
	}
	
	public function back()
	{
		/*
		* Функция позволяет вернуть назад во время создания вопросов для теста.
		* Здесь используются 2 переменных сессии - это id теста и id вопроса.
		*/
		$this->load->view('javascript');
	}
	
	public function weiter(){
		
		$this->session->unset_userdata('numquestion');
		$this->session->unset_userdata('namequestion');
		
		$this->load->view('header');
		$this->load->view('admin/menu');
				
		$this->load->model('testing');
		$res = $this->testing->getmaxquestioncode($this->session->userdata('idtest'));
		//$this->max = $res->maxcode;
		
		$this->load->view('admin/question', $res);
	}
	
	public function exittest(){
		$this->session->unset_userdata('idtest');
		$this->session->unset_userdata('nametest');
		$this->session->unset_userdata('idquestion');
		$this->session->unset_userdata('numquestion');
		$this->session->unset_userdata('namequestion');
	
		redirect('/');
	}
	
	public function list_users($id)
	{
		$this->load->view('header');
		$this->load->view('container');
		$this->load->view('admin/menu');
		
		$this->load->library('pagination');
		$this->load->model('testing');
		
		$countresultuser = $this->testing->getListUser($id);
		
		$config['base_url'] = base_url() . 'test/list_users/'. $id.'/';
		$config['total_rows'] = $countresultuser->num_rows();
		$config['per_page'] = 10;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
		$config['uri_segment'] = $this->uri->segment(4);
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] = 'First';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['last_link'] = 'Last';
		//$sgmt = $this->uri->segment(4);

		//$config['num_links'] = 5;

		$this->pagination->initialize($config); 
		
		$ql=$this->testing->pageListUser($id, $config['per_page'], $config['uri_segment']);
		foreach($ql as $val){
			$this->load->view('admin/list_users_view', $val);
		}
		
		$this->load->view("admin/pagination_user");
		
		$this->load->view("footer");
	}
	
	public function viewer_group($id){
		
		$this->load->view('header');
		
		if($this->session->userdata('profile') == 0)
		{
			// если это Пользователь
			$this->load->view('user/menu');
			
			$this->load->model('testing');
			$res = $this->testing->viewtestofgroup($id);
			if (is_object($res)){
				$row = $res->result_array();
				$this->load->view('header_testview');
				foreach($row as $key=>$val)
				{
					$this->load->view('user\testview', $val);
				}
				$this->load->view('footer_testview');
			} else {
			$this->flg_message = 4;
			$this->load->view('message', $this);
			} 
		} else if($this->session->userdata('profile') == 1)
		{
			$this->load->view('admin/menu');
			
			$this->load->model('testing');
			$res = $this->testing->viewtestofgroup($id);
			if (is_object($res)){
				$row = $res->result_array();
				$this->load->view('header_testview');
				foreach($row as $key=>$val)
				{
					$this->load->view('admin\testview', $val);
				}
				$this->load->view('footer_testview');
			} else {
				$this->flg_message = 5;
				$this->load->view('message', $this);
			}
		}		
		
		$this->load->view("footer");
		
	}
	
	public function delete_group($id)
	{
		$this->load->model('testing');
		$this->testing->delete_group($id);
		
		redirect('/');
	}
	
	public function viewer_test($id){
		
		$this->load->view('header');
		$this->load->view('admin/menu');
		
		$this->load->model('testing');
		$res = $this->testing->view_question($id);
		$this->load->view("admin/header_question");
		foreach($res as $key=>$val){
			$qid = $val->qid;
			$this->load->view("admin/view_full_question", $val);

			$res_answer = $this->testing->view_answer($qid);
			foreach($res_answer as $key_ans=>$val_ans){
				$this->load->view("admin/view_answer", $val_ans);
			}
			 $this->load->view("admin/footer_answer");
		}
		$this->load->view("admin/footer_question");
		$this->load->view("footer");
		
	}
	
	public function pass_test($id, $idquestion){
		$this->load->view('header');
		$this->load->view('user/menu');
		
		$this->load->model('testing');
		
		$test = $this->testing->view_test($id);
		//$res = $this->testing->view_question($id);
		$res = $this->testing->count_question($id);
		
		$config['testid'] = $id;
		$config['nametest']=$test->name;
		$config['current_num'] = $this->uri->segment(4);	
		$config['total_rows'] = $res;
		$config['per_page'] = '1';
		
		$this->load->view('user/header_question', $config);
		
		$data = $this->testing->setquestion($id, $idquestion, $config['per_page'], $config['total_rows']);		
		foreach($data as $key=>$val){
			$id_question = $val['id'];
			$data2 = $this->testing->setanswers($id_question);
		   $this->load->view('user/question_view', $val);
		   foreach($data2 as $key2=>$val2){
			    $this->load->view('user/answer_view', $val2);	
		   }			
		}
		$this->load->view('pagination');
		$this->load->view('footer');
		
		$this->session->set_userdata('loggin_test', '1');
	}
	
	public function write_result($test_id, $question_id, $answer){
		$user_id = $this->session->userdata('user_id');
		
		$this->load->model('testing');
		$this->testing->setResult($user_id, $test_id, $question_id, $answer);
	}
	
	public function view_result_test($test_id){
		$this->load->view('header');
		$this->load->view('/user/menu');
		
		$user_id = $this->session->userdata('user_id');
		
		$this->load->model('testing');
		
		$res = $this->testing->getQuestion($test_id);
		$this->mark=0;
		$this->general_mark = 0;
		//$res = $this->testing->getResult($user_id, $test_id);
		
		foreach($res as $val){
			//$this->load->view('header_result_test', $val);
			//echo "<p style='color:blue'>". $val->name . "->".$val->mark_id . "</p>";
			$this->general_mark += $val->mark_id;
			$ball = $val->mark_id;
			if ($val->type == 2){
				$resans = $this->testing->getAnswer($val->id);
				$count=0;
				foreach($resans as $variable){
					if ($variable->richtig == 1){
						$count ++;
						$idansrichtig[] = $variable->id;
					}
				}
			} else if ($val->type == 1){
				$count = 1;
			}
			
			
			$idans = $val->id;
			$res2 = $this->testing->getResult($user_id, $test_id, $idans);
			//$res2 =  $this->testing->getAnswer($idans);
			$countans = 0;
			$countans_richtig = 0;
			$countans_not = 0;
			foreach($res2 as $val2){		
				$countans++;
				$richtig = $val2->richtig;
				if ($richtig == 0){
					//echo "<p style='color:red'>". $val2->aname . "</p>";
					$countans_not++;
				} else if ($richtig == 1){
					//echo "<p style='color:green'>". $val2->aname . "</p>";
					$countans_richtig++;
					//$mark += $ball;
				}
				
			}
			
			if (($countans_richtig == $count) AND ($countans_not == 0)){
				$this->mark += $ball; 
			} else if (($countans_richtig == $count) AND ($countans_not > 0)){
				$countans_not_ball = $countans_not*0.5;
				$count_ball = $ball - $countans_not_ball;
				$this->mark += $count_ball;
			} else if (($countans_richtig <> $count) AND ($countans_not == 0)){
				$countnot_choose = $count - $countans_richtig;	// получаем количество не выбранных ответов
				$countans_not_ball = $countnot_choose*0.5;
				$count_ball = $ball - $countans_not_ball;
				$this->mark += $count_ball;
			} else if (($countans_richtig <> $count) AND ($countans_not > 0)){
				$countnot_choose = $count - $countans_richtig;
				$countans_not_ball = $countnot_choose*0.5;
				$countans_not_ball += $countans_not*0.5;
				
				$count_ball = $ball - $countans_not_ball;
				$this->mark -= $count_ball;
			}
			
		}
		
		switch (substr($this->mark, -1)){
			case 1: $this->ok_ball = "балл";
				break;
			case 2:
			case 3:
			case 4: $this->ok_ball = "балла";
				break;
			case 0:
			case 5:
			case 6:
			case 7:
			case 8:
			case 9: $this->ok_ball = "баллов";
				break;
		}
		
		if ($this->general_mark == 0) $this->load->view("notruntest");
		else {
			$this->assesment = ceil(($this->mark*100)/$this->general_mark);
			if ($this->assesment < 55) {
				$this->result = "Тестирование не пройдено";
			} else if (($this->assesment > 55) AND ($this->assesment < 70)) {
				$this->result = "Зачтено (3)";
			} else if (($this->assesment > 70) AND ($this->assesment < 90)) {
				$this->result = "Хорошо (4)";
			} else if ($this->assesment > 90) {
				$this->result = "Отлично (5)";
			}
			$this->load->view("header_result_test", $this);
			
		}		
		$this->load->view("footer");
	}
	
	public function set_user_response(){
		$this->load->model('testing');
		$this->testing->setAnswer();
	}
	
	public function viewer_question($id){
		
		$this->load->view('header');
		$this->load->view('admin/menu');
		$this->load->model('testing');
		$this->testing->view_answer($id);
		
	}

	public function viewer_result(){
		
	}
	
	public function import($id){
		
		$this->load->view('header');
		$this->load->view('admin/menu');
		
		$dom = new domDocument("1.0", "windows-1251");
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		
		$tasks = $dom->appendChild($dom->createElement('tasks'));
		
		$this->load->model('testing');
		$quest = $this->testing->getQuestion($id);
		
		foreach($quest as $key=>$val){
			
			$task = $tasks->appendChild($dom->createElement('task'));
			$code = $task->appendChild($dom->createAttribute('code'));
				$code->appendChild($dom->createTextNode($val->code));
			$variant = $task->appendChild($dom->createElement('variant'));
					$answer_type = $variant->appendChild($dom->createAttribute('answer-type'));
					if ($val->type == 1) $answerType = 'single';
						else if($val->type==2) $answerType = 'multiple';
						$answer_type->appendChild($dom->createTextNode($answerType));
					$variant_code = $variant->appendChild($dom->createAttribute('code'));
						$variant_code->appendChild($dom->createTextNode("1"));
					$question = $variant->appendChild($dom->createElement('question'));
						$question->appendChild($dom->createTextNode($val->name));
						$level = $question->appendChild($dom->createAttribute('level'));
							$level->appendChild($dom->createTextNode($val->level));
						$mark = $question->appendChild($dom->createAttribute('mark'));
							$mark->appendChild($dom->createTextNode($val->mark_id));						
					$answers = $variant->appendChild($dom->createElement('answers'));
					$queryanswer = $this->testing->getAnswer($val->id);										
					foreach($queryanswer as $key=>$value){
						$answer = $answers->appendChild($dom->createElement('answer'));
						$answer_code = $answer->appendChild($dom->createAttribute('code'));
							$answer_code->appendChild($dom->createTextNode(++$value->code));
						$answer_correct = $answer->appendChild($dom->createAttribute('correct'));
							if ($value->richtig == 0) $correct = "no";
								else $correct = "yes";
							$answer_correct->appendChild($dom->createTextNode($correct));
						$answer->appendChild($dom->createTextNode($value->name));
					}
		}
		//$dom->save("application/upload/test_".$id.".xml");
		$dom->save("upload/test_".$id.".xml");
		
		//$dir = "d:/Server/www/testdrive/application/upload/";
		$dir = "d:/Server/www/testdrive/upload/";
		$dir_1 = "/testdrive/upload/";
		$files = scandir($dir);
		for ($i=2; $i<sizeof($files); $i++){
			$this->dir = $dir_1;
			$this->files = $files[$i];
			$this->load->view('view_save_file', $this);
		}; 

		
		$this->load->view("footer");
		
	}
	
	
	public function delete_file($files)
	{
		unlink ("d:/Server/www/testdrive/upload/" . $files);
	}
	
	public function edit_test($id)
	{
		$this->load->view('header');
		$this->load->view('admin/menu');
		
		$this->load->model('testing');
		$res = $this->testing->view_question($id);
		$this->load->view("admin/header_question");
		foreach($res as $key=>$val){
			$qid = $val->qid;
			$this->load->view("admin/edit_question", $val);

			$res_answer = $this->testing->view_answer($qid);
			foreach($res_answer as $key_ans=>$val_ans){
				$this->load->view("admin/edit_answer", $val_ans);
			}
			 $this->load->view("admin/footer_answer");
		}
		$this->load->view("admin/footer_question");
		$this->load->view("footer");
	}
	
	public function delete_test($id)
	{
		$this->load->model('testing');
		$this->testing->delete_test($id);
		
		redirect('/');
	}
	
	public function delete_question($id)
	{
		$this->load->model('testing');
		$this->testing->deleteQuestion($id);
		$test = $this->uri->segment(3);	
		
		redirect('/');
		
	}	
	
	public function noview_test($id)
	{
		$this->load->model("testing");
		$this->testing->noview($id);
		
		redirect('/');
	}
	
	public function view_test($id)
	{
		$this->load->model("testing");
		$this->testing->view($id);
		
		redirect('/');
	}
	
	public function export()
	{
		$this->load->view('header');
		$this->load->view('admin/menu');
		$this->load->view('admin/header_openfile');
		$this->load->model('testing');
		$gr = $this->testing->getgroup();
		if (is_object($gr)){
			$row = $gr->result_array();
			foreach($row as $key=>$val)
			{
				$this->load->view('admin\listgroup', $val);
			}
		} 		
		$this->load->view("admin/view_openfile");
		if (isset($_POST['submit'])){
			$this->group = $_POST['group'];
			if ($xml_object=@simplexml_load_file($_FILES['loadfile']['tmp_name'] ) ){
				$this->load->model('testing');
				$this->load->model('questionmodel');
				$this->load->model('answermodel');
				
				$nametest = explode('.', $_FILES['loadfile']['name']);
				$this->testing->create($nametest[0], $this->group);
				//$this->testing->getLastTest();
				foreach ($xml_object as $object){
					$question=$object->variant->question;
					$name = (string)$question;
					$level=$object->variant->question['level'];
					$mark=$object->variant->question['mark'];
					$idtest = $this->session->userdata('idtest');
					if ($object->variant['answer-type'] == 'single'){
						$type=1;
					} else if ($object->variant['answer-type'] == 'multiple'){
						$type=2;
					}				
					$code=$object['code'];
					$this->questionmodel->create($idtest, $code, $name, $level, $mark, $type, 0);		
					
					foreach($object->variant->answers->answer as $ans){
						$ansname=(string)$ans;
						$anscode=$ans['code'];
						
						if ($ans['correct'] == 'yes')
						{
							$correct = 1;
						} else if ($ans['correct'] == 'no'){
							$correct = 0;
						}
						$this->answermodel->create($this->session->userdata('idquestion'), $anscode, $ansname, $correct);
						
					}
				}
				
				if (is_uploaded_file($_FILES['loadfile']['tmp_name'])) {
				$this->log = 1;
				$this->load->view('errors',$this);
			} else {
				$this->log = 0;
				$this->load->view('errors',$this);
			}
			
			} else {
				$this->log = 3;
				$this->load->view('errors',$this);
			}
			
			
				
		}
		$this->load->view("footer");
		
	}
	
	public function update()
	{
		
	}
		
		
}
?>