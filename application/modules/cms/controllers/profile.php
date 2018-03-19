<?php
class Profile extends MY_Controller{
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
		if($check_session==false){
			redirect(base_url('sign'));
			if(isset($this->info_company)==false){
				return redirect(base_url('exits'));
			}
		}
	}
	
	
	public function index(){
		$cmd = $this->input->post('cmd');
		if(!empty($cmd)){
			if($cmd=="UpdateProfile"){
				$Me_update_profile =  array(
					'id_client' => $this->id_client,
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
				);
				$response = $this->UpdateProfileMe($Me_update_profile);
				$msg = $response->results;
				
			}
			if($cmd=="UpdatePassword"){
				$MeUpdatePasword = array(
					'id_client' => $this->id_client,
					'passwordold' => $this->input->post('passwordold'),
					'passwordnew' => $this->input->post('passwordnew'),
				);
				$responsePw = $this->UpdatePasswordsMe($MeUpdatePasword);
				$msg = $responsePw->results;
			}
		}
		$msg = '';
		$data = array(
			'msg' => $msg,
			'profileInfo' => $this->service_load_profile(),
			'title'=> 'Profile My Account uDNS',
			'title_main'=> 'Profile Account uDNS',
			'user_domain' => $this->user_domain,
			'id_levels' => $this->id_levels,
		);
		$this->parser->parse('default/header',$data);
		$this->parser->parse('default/sidebar',$data);
		$this->parser->parse('default/profile',$data);
		$this->parser->parse('default/footer',$data);
	}
	
	private function UpdatePasswordsMe($params){
		$ParamsInfoPasswordUpdateMe = array(
			'params' => array(
				'key' => $this->key_api,
				'cmd' => 'UpdateProfile',
				'data' => $params,
			)
		);
		$response = $this->rest->post('apps/api/PasswordUpdateMe',$ParamsInfoPasswordUpdateMe);
		
		return $response;
	}
	
	private function UpdateProfileMe($params){
		$ParamsInfoUpdateMe = array(
			'params' => array(
				'key' => $this->key_api,
				'cmd' => 'UpdateProfile',
				'data' => $params,
			)
		);
		$response = $this->rest->post('apps/api/ProfileUpdateMe',$ParamsInfoUpdateMe);
		return $response;
	}
	private function service_load_profile(){
		$ParamsInfoClients = array(
			'params' => array(
				'key' => $this->key_api,
				'cmd' => 'LoadProfile',
				'data' => array(
					'id_client'  => $this->id_client,
				)
			)
		);
		$response = $this->rest->post('apps/api/profile',$ParamsInfoClients);
		if(!empty($response)){
			if(!empty($response->results)){
				$result = array(
					'username' => $response->results[0]->username,
					'email' => $response->results[0]->email,
					'phone' => $response->results[0]->phone,
					'update_date' => $response->results[0]->update_date,
					'auth' => $response->results[0]->auth,
					
				);
				return $result;
			}else{
				return $result = null;
			}
		}else{
			return $result = null;
		}
	}
	
	
}
?>