<?php
class Sign extends MY_Controller{
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
			if(isset($this->info_company)== true){
				redirect(base_url('cms'));
			}else{
				redirect(base_url('exits'));
			}
		}
		
		
	}
	
	public function index(){
		$msg = '';
		$cmdLogin = $this->input->post('cmdLogin');
		if($cmdLogin=="LoginAccount"){
			$user_domain = $this->input->post('domain_name');
			$password = $this->input->post('password');
			$params_login = array(
				'params' => array(
					'key' => $this->key_api,
					'cmd' => $cmdLogin,
					'data' => array(
						'user_domain'   => $user_domain,
						'password'   => $password,
					),
				),
			);
			$response = $this->rest->post('apps/api/login_account',$params_login);
			if(!empty($response->results->message->code)){
				$code = $response->results->message->code;
				
				if($code == 1000){
					$result_response = array(
						'id_client'	=>	$response->results->id,
						'user_domain'	=>	$response->results->data->user_domain,
						'email'	=>	$response->results->data->email,
						'phone'	=>	$response->results->data->phone,
						'id_reseller'	=>	$response->results->data->id_reseller,
						'id_levels'	=>	$response->results->data->id_levels,
						'auth'	=>	$response->results->data->auth,
						'status'	=>	$response->results->data->status,
						'auth_login'	=>	true,
					);
					$this->session->set_userdata($result_response);
					$check_session = $this->session->userdata('auth_login');
					if($check_session==true){
						return redirect(base_url('cms'));
					}
				}else{
					$msg = '<div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Alert! vui lòng xóa caching & cookie và đăng nhập lại</h4> </div>';
				
				}
				
			}else{
				$msg = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> '.$response->results->code .'-'.$response->results->message . '</h4> Please enter your correct domain name and password</div>';
			}
		}
		$data = array(
			'msg' => $msg,
			'title'=> 'Control Panel Domain Work Apps',
		);
		$this->parser->parse('default/header_sign',$data);
		$this->parser->parse('default/sign',$data);
		$this->parser->parse('default/footer_sign',$data);
	}
	
	
	
}
?>