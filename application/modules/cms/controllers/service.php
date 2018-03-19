<?php
class Service extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		$this->load->model('global_model', 'GlobalMD');	
		$this->conf = $config = array('server' => 'http://register.vn/apps',
			'api_key'         => '800f5dd9c89fb4c96db5837c893c1010',
			'api_name'        => 'app_key',
		);
	}
	public function Test_Connect(){
		$this->input->get('params');
	}
	public function EncryptService(){
		
		$dn = array(
			 "countryName"            => "VN",
			 "stateOrProvinceName"    => "Hanoi",
			 "localityName"           => "Hanoi",
			 "organizationName"       => "UGroups JSC",
			 "organizationalUnitName" => "Domain Ureg.Asia Groups",
			 "commonName"             => "Ureg.Asia Groups JSC",
			 "emailAddress"           => "info@ureg.asia"
		);
	
		$key_public = core_encode($this->DataEncrypt());
		echo $key_public;
		die;
		// $test_file = json_encode($dn);
		// $mahoa = ssl_encrypt($key_public,$test_file);
		// $giaima = ssl_decrypt($key_private,$mahoa);
			$data = array(
				'ssl' => core_encode($key_public),
			);
		$this->rest->initialize($this->conf);
		$results = $this->rest->get('/cms/api_ssl/ServiceOpenSSL',$data);
		var_dump($results);
	}
	
	public function DataEncrypt(){
				$data = "-----BEGIN PRIVATE KEY-----
				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
				vAteLaItwCoZLlWWAAVTZfEBavPvRE/I
				-----END PRIVATE KEY-----
				";
				return $data;
	}
	public function test_ssl(){
		
		$dn = array(
			 "countryName"            => "VN",
			 "stateOrProvinceName"    => "Hanoi",
			 "localityName"           => "Hanoi",
			 "organizationName"       => "UGroups JSC",
			 "organizationalUnitName" => "Domain Ureg.Asia Groups",
			 "commonName"             => "Ureg.Asia Groups JSC",
			 "emailAddress"           => "info@ureg.asia"
		);
		$file_name = "ureg_ssl_".date("YmdHis",time());
		$response = create_ssl($dn,$file_name);
		$test_file = json_encode($dn);
		// var_dump($response);
		$key_ssl = $response['key_ssl'][1];
		$crt_ssl = $response['crt_ssl'][1];
		$key_public = ssl_read_file($key_ssl);
		$key_private = ssl_read_file($crt_ssl);
		$mahoa = ssl_encrypt($key_public,$test_file);
		$giaima = ssl_decrypt($key_private,$mahoa);
		var_dump($mahoa);
		var_dump($giaima);
		//////////////////////////////////////////
		
	}
	public function test(){
		$this->load->view('default/footer');
	}
	
	public function index(){
		
		$config = array('server' => 'http://register.vn/apps',
			'api_key'         => '800f5dd9c89fb4c96db5837c893c1010',
			'api_name'        => 'app_key',
		);
		$this->rest->initialize($config);
		$data = array();
		$results = $this->rest->get('/cms/core/index',$data);
		echo($results);
	}
	
}
?>