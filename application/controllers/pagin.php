<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagin extends CI_Controller {

	public function page()
       {
			$this->load->model('paginmodel');
			$config['base_url'] = 'http://127.0.0.1/testdrive/index.php/pagin/page';
			$config['total_rows'] = $this->paginmodel->counttest();
			$config['per_page'] = '1';
			$config['uri_segment'] = 3;
			//$config['first_link'] = '0';
			$page = $this->uri->segment(3);
			$this->pagination->initialize($config);

			$data = $this->paginmodel->getnametest($config['per_page'],$page);
			foreach($data as $key=>$val){
				$this->load->view('user/question_view', $val);
			}
			
			
		}

}
?>