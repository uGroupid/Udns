<?php
class Unit extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		// $this->load->model('global_model', 'GlobalMD');	
		// $config =  array('server' => 'http://192.168.1.221/apps',);
		// $this->rest->initialize($config);
		// $param_company = array('params' =>$_SERVER['HTTP_HOST'],);
		// $this->info_company = $this->rest->get('apps/api/company_info',$param_company);
		// $this->key_api = $this->info_company->key_api;
		// $check_session = $this->session->userdata('auth_login');
		// if($check_session==true){
			// return redirect(base_url('cms'));
		// }if($this->info_company == true){
			
		// }else{
			// redirect(base_url('exits'));
		// }
		// $this->load->helper('error_code');
		// $this->load->helper('error_code');
		
		$this->auth = array(
		  "table" => "`users`",
		  "fields" => "`username`, `user_id` AS `id`, `password`",
		  "username_field" => "`username`",
		  "password_field" => "`password`",
		  "id_field" => "`id`",
		  "service_name" => "pyramids.social",
		  "cookie_name" => "pyramids_social_token"
		);
		
	}

	public function index(){
	
	
		// $this->load->helper('jwt');
		// $this->load->helper('auth');
		// $username_value = "handesk";
		// $id_value = 12;
		// $cookie_name = "uGroup";
		// $service_name = "udns.asia";
		 // echo json_encode(generate_jwt_cookie($username_value, $id_value, $service_name, $cookie_name));
		 // echo json_encode(regenerate_jwt_cookie($service_name, $cookie_name));
	}
	
	public function test(){
			// $this->load->helper('jwt');
		// $this->load->helper('auth');
		// $username_value = "handesk";
		// $id_value = 12;
		// $cookie_name = "uGroup";
		// $service_name = "udns.asia";
		 // echo json_encode(regenerate_jwt_cookie($service_name, $cookie_name));
		 // echo json_encode(get_jwt_data( $cookie_name));
		 
		$ssl_path = getcwd();
		$ssl_path = preg_replace('/\\\/','/', $ssl_path);  // Replace \ with /
		$config = array(
			"config" => "$ssl_path/openssl.cnf"
		);
		var_dump($config);
	}
	
	
}
?>