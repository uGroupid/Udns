<?php
class Angularjs extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		$this->load->model('global_model', 'GlobalMD');	
		$config =  array('server' => 'http://192.168.1.221/apps',);
		$this->rest->initialize($config);
		$param_company = array('params' =>$_SERVER['HTTP_HOST'],);
		$this->info_company = $this->rest->get('apps/api/company_info',$param_company);
		if($this->info_company == true){
			// return $this->info_company;
		}else{
			redirect(base_url('exit'));
		}
		
	}
	
	public function company_info(){
		$this->output->set_content_type('application/json')->set_output(json_encode($this->info_company));
	}
	
	
	
}
?>