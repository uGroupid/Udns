<?php
class Helpcenter extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		$this->load->model('global_model', 'GlobalMD');	
		$config =  array('server' => 'http://192.168.1.221/apps',);
		$this->rest->initialize($config);
		$param_company = array('params' =>$_SERVER['HTTP_HOST'],);
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
	
	public function recovery_password(){
		$msg = '';
		$data = array(
			'msg' => $msg,
			'title'=> 'Recovery password uDNS',
		);
		$this->parser->parse('default/header_sign',$data);
		$this->parser->parse('default/recovery_password',$data);
		$this->parser->parse('default/footer_sign',$data);
	}
	
	public function index(){
		$msg = '';
		$data = array(
			'msg' => $msg,
			'title'=> 'Control Panel Domain Work Apps',
		);
		$this->parser->parse('default/header_sign',$data);
		$this->parser->parse('default/helpcenter',$data);
		$this->parser->parse('default/footer_sign',$data);
	}
	
	
	
}
?>