<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vote extends CI_Controller {
	
	function superadmin(){
		$tmp = $this->session->userdata('codeid');
		$data['user'] = $uid = $this->db->query("select * from user")->result();
		$data['projects'] = $prid = $this->db->query("select * from project")->result();
		$this->load->view('superadmin',$data);
	}
	function like($pid){
		$tmp = $this->session->userdata('codeid');
		$data['user_id'] = $uid = $this->db->query("select * from user WHERE code = '$tmp'")->row()->id;
		$data['project_id'] = $prid = $this->db->query("select * from project WHERE id = '$pid'")->row()->id;
		$query = $this->db->query("SELECT * FROM vote WHERE user_id = '$uid' AND project_id = '$prid'")->result();
		if(!$query)
			$this->db->insert('vote',$data);
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	function point2($cat,$pid){
		$tmp = $this->session->userdata('codeid');
		$data['user_id'] = $uid = $this->db->query("select * from user WHERE code = '$tmp'")->row()->id;
		$data['project_id'] = $pid;
		$data['rating_id'] = $cat;
		$query = $this->db->query("SELECT * FROM ranking WHERE user_id = '$uid' AND project_id = '$pid' AND rating_id = '$cat'")->result();
		if(!$query)
			$this->db->insert('ranking',$data);
		else
			$this->db->query("DELETE FROM ranking WHERE user_id = '$uid' AND project_id = '$pid' AND rating_id = '$cat'");
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	function point($pid,$cat){
		$tmp = $this->session->userdata('codeid');
		$uid = $this->db->query("select * from user WHERE code = '$tmp'")->row()->id;
		$query = $this->db->query("SELECT count(*) as total FROM ranking WHERE user_id = '$uid' AND project_id = '$pid' AND rating_id = '$cat'")->row()->total;
		$newp = $this->db->query("SELECT points as total FROM user WHERE code = '$tmp'")->row()->total;

		if($query == 0)
		{
				$newp = $newp-1;
				$this->db->query("UPDATE user SET points = $newp WHERE code = '$tmp'");
			
				$data['user_id'] = $uid;
				$data['project_id'] = $pid;
				$data['rating_id'] = $cat;
				$this->db->insert('ranking',$data);
				echo $cat."|"."true"."|".$newp;
		}
		else
		{
				$newp = $newp+1;
				$this->db->query("UPDATE user SET points = $newp WHERE code = '$tmp'");
				
				$this->db->query("DELETE FROM ranking WHERE user_id = '$uid' AND project_id = '$pid' AND rating_id = '$cat'");
				echo $cat."|"."false"."|".$newp;
		}
		/*if($query)
		{
			if($newp >= 1)
			{
				$newp = $newp-1;
				$this->db->query("UPDATE user SET points = $newp WHERE code = '$tmp'");
			
				$data['user_id'] = $uid = $this->db->query("select * from user WHERE code = '$tmp'")->row()->id;
				$data['project_id'] = $prid = $this->db->query("select * from project WHERE id = '$pid'")->row()->id;
				$data['rating_id'] = $cat;
				$this->db->insert('vote',$data);
				echo $cat."|"."true"."|".$newp;
			}
		}
		else
		{
			$newp = $newp+1;
			$this->db->query("UPDATE user SET points = $newp WHERE code = '$tmp'");
			
			$this->db->query("DELETE FROM ranking WHERE user_id = '$tmp' AND project_id = '$pid' AND rating_id = '$cat'");
			echo $cat."|"."false"."|".$newp;
		}*/
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */