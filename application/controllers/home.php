<?php
class Home extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		$this->load->model('global_model', 'GlobalMD');	
		$config =  array('server' => 'http://192.168.1.221/apps',);
		$this->rest->initialize($config);
		$param_company = array('params' => $_SERVER['HTTP_HOST'],);
		$this->info_company = $this->rest->get('apps/api/company_info',$param_company);
		$this->key_api = $this->info_company->key_api;
		$check_session = $this->session->userdata('auth_login');
		if($check_session==true){
			return redirect(base_url('cms'));
		}if($this->info_company == true){
			
		}else{
			redirect(base_url('exits'));
		}
		
	}

	public function index(){
		$msg = '';
		$data = array(
			'msg' => $msg,
			'title'=> 'Free DNS Control Panel for Businesses or Individuals.',
		);
		$this->parser->parse('default/header_sign',$data);
		$this->parser->parse('default/udns_home_index',$data);
		$this->parser->parse('default/footer_sign',$data);
	}
	
	
	
}
?>