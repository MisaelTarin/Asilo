<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
			
	public function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->view('templates/main');
	}
	
	function about(){
		$tmp = $this->session->userdata('codeid');
		$data['users'] = $this->db->query("select * from user where code = '$tmp'")->result();
		$data['participants'] = $this->db->query("select * from participant WHERE project_id=10")->result();
		$data['projects'] = $this->db->query("select * from project WHERE id=10")->result();
		$this->load->view('templates/about',$data);
	}
	
	function help(){
		$tmp = $this->session->userdata('codeid');
		$data['users'] = $this->db->query("select * from user where code = '$tmp'")->result();
		$this->load->view('templates/help',$data);
	}
	
	public function user()
	{
		$tmp = $this->session->userdata('codeid');
		$data['users'] = $this->db->query("select * from user where code = '$tmp'")->result();
		$data['projects'] = $this->db->query("select * from project where id = '1'")->result();
		$this->load->view('templates/user',$data);
	}
	
	function validateuser(){
		$this->load->model('main_model');
		$this->main_model->validateUser();
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('','refresh');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */