<?php
class Exits extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		$result_response = array($this->session->all_userdata());
		$this->session->unset_userdata($result_response);
		$login = $this->session->unset_userdata('auth_login');	
		if($login==true){
			return redirect(base_url('cms'));	
		}else{
			return redirect(base_url('sign'));	
		}

	}
	
	public function index(){	
		$result_response = array($this->session->all_userdata());
		$this->session->unset_userdata($result_response);
		$this->session->unset_userdata('auth_login');	
		$login = $this->session->unset_userdata('auth_login');	
		if($login==true){
			return redirect(base_url('cms'));	
		}else{
			return redirect(base_url('sign'));		
		}
	
	}
	
}
?>