<?php
class Main_model extends CI_Model {

	function index(){
		$this->load->view('templates/main');
	}
	
	function checkLike($pid){
		$tmp = $this->session->userdata('codeid');
		$uid = $this->db->query("select * from user WHERE code = '$tmp'")->row()->id;
		$query = $this->db->query("SELECT * FROM vote WHERE user_id = '$uid' AND project_id = '$pid'")->result();
		if($query)
			return false;
		else
			return true;
	}
	
	function dashboard(){
		$this->load->model('data_model');
		$data['sales'] = $this->db->query("SELECT COUNT(product_id) AS 'total' FROM sale")->result();
			//$query = $this->db->query("SELECT *  FROM product NATURAL JOIN sale");
			//echo $query->result()->;
		$data['isLogged'] = $this->session->userdata('isLogged');
		$data['user'] = $this->session->userdata('username');
		$this->load->view('templates/dashboard',$data);
	}
    
	function getUserData(){
		$user = $this->session->userdata('username');
		$query = $this->db->query("SELECT * from user WHERE username = '$user'");
		return $query->result();
	}
	
	function validateUser(){
		$code = strtoupper($this->input->post('code'));
		$query = $this->db->query("SELECT * from user WHERE code = '$code'")->result();
		if($query){
			$data = array(
			'codeid' => $code,
			'isLogged' => true
			);
			$this->session->set_userdata($data);
		}
		redirect('','refresh');
	}
	
	function createUser(){
		$data['username'] = $this->input->post('user');
		$data['password'] = $this->input->post('pass');
		$flag = true;
		if(($data['username'] == "")||($data['password'] == "")){
			$flag = false;
		}
		if($flag == true){
			$this->db->insert('user',$data);
		}
		redirect('','refresh');
	}
}
?>