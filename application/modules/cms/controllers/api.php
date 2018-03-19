<?php
class Api extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		$config =  array('server' => 'http://192.168.1.221/apps',);
		$this->rest->initialize($config);
		$param_company = array('params' =>$_SERVER['HTTP_HOST'],);
		$this->info_company = $this->rest->get('apps/api/company_info',$param_company);
		$this->key_api = $this->info_company->key_api;
		$this->user_domain = $this->session->userdata('user_domain');
		$this->id_levels = $this->session->userdata('id_levels');
		$this->id_client = $this->session->userdata('id_client');
		if($this->info_company == true){ }else{
			redirect(base_url('exit'));
		}
		$check_session = $this->session->userdata('auth_login');
		if($check_session==false){
			return redirect(base_url('sign'));
		}
	}
	public function AdCheck(){
		
		$AdsCheck = $this->session->userdata('CheckAds');
		if(isset($AdsCheck)==true){
			$AdsGet = $this->session->userdata('CheckAds');
			if($AdsGet==true){
				$timeOld = (int)$AdsGet = $this->session->userdata('TimeAds');
				if(time()-$timeOld > 3600){
					$Ads = array(
						'TimeAds' => time(),
						'CheckAds' => 1,
					);
					$this->session->set_userdata($Ads);
					$AdsInstall = $this->session->userdata('CheckAds');
					if($AdsInstall==true){
						echo 1;
					}else{
						echo 1;
					}
				}else{
					echo 0;
				}
			}else{
				$Ads = array(
					'TimeAds' => time(),
					'CheckAds' => true,
				);
				$this->session->set_userdata($Ads);
				$AdsInstall = $this->session->userdata('CheckAds');
				if($AdsInstall==true){
					echo 1;
				}else{
					echo 1;
				}
			}
		}else{
			$Ads = array(
				'TimeAds' => time(),
				'CheckAds' => true,
			);
			$this->session->set_userdata($Ads);
			$AdsInstall = $this->session->userdata('CheckAds');
			if($AdsInstall==true){
				echo 1;
			}else{
				echo 1;
			}
		}
		
	}
	

	private function load_zone(){
		$params_InfoZone_zone = array(
			'params' => array(
				'key' => $this->key_api,
				'cmd' => 'InfoZoneClients',
				'data' => array(
					'id_clients'  => core_encrypt_convert($this->id_client),
				)
			)
		);
		$results = $this->rest->post('apps/api/zone',$params_InfoZone_zone);
		return $results;
	}
	public function index(){
		$response = $this->load_zone();
	}
	
}
?>