<?php
class Cms extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		$this->load->model('global_model', 'GlobalMD');	
		$config =  array('server' => 'http://192.168.1.221/apps',);
		$this->rest->initialize($config);
		$param_company = array('params' =>$_SERVER['HTTP_HOST'],);
		$this->info_company = $this->rest->get('apps/api/company_info',$param_company);
		$this->key_api = $this->info_company->key_api;
		$this->user_domain = $this->session->userdata('user_domain');
		$this->id_levels = $this->session->userdata('id_levels');
		$this->id_client = $this->session->userdata('id_client');
		$check_session = $this->session->userdata('auth_login');
		
		if($check_session == false){
			
			if(isset($this->info_company)==false){
				return redirect(base_url('exits'));
			}
		}
	}
	
	
	public function index(){
		
	}
	
	
	
	
}
?>