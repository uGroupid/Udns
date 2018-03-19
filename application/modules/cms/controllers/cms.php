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
	
	
	
	public function ZoneUpdate($id_zone){
		$params_create_encrypt = array(
			'params' => $id_zone,
		);
		$encrypt  = $this->rest->post('apps/api/encrypt',$params_create_encrypt);
		$params_InfoZone_zone = array(
			'params' => array(
				'key' => $this->key_api,
				'cmd' => 'UpdateZone',
				'data' => array(
					'id_zone'  => $encrypt->results,
				)
			)
		);
		
		$response = $this->rest->post('apps/api/zone',$params_InfoZone_zone);
		return $response;
	}
	private function load_encrypt($string){
		$params_create_encrypt = array(
			'params' => $string,
		);
		$encrypt  = $this->rest->post('apps/api/encrypt',$params_create_encrypt);
		return $encrypt->results;
	}
	public function record(){
		$params = $this->input->get_post('params');
		foreach($params as $value){}
		$id_zone = $value['id_zone'];
		$name_record = $value['name_record'];
		$data_record = $value['data_record'];
		$type_record = $value['type_record'];
		$aux = $value['aux'];
		$params_create_news_record = array(
			'params' => array(
				'key' => $this->key_api,
				'cmd' => 'CreateNewRecord',
				'data' => array(
					'id_zone'  => $this->load_encrypt($id_zone),
					'name_record'  => $name_record,
					'type_record'  => $type_record,
					'data_record'  => $data_record,
					'aux'  => $aux,
				)
			)
		);
		$results = $this->rest->post('apps/api/record',$params_create_news_record);
		echo json_encode($results->results);
	}
	public function remove_record(){
		$id_zone = trim($this->input->get('id_zone'));
		$id_record = trim($this->input->get('id_record'));
		if(isset($id_record)){
			if(isset($id_zone)){
				$params_create_news_record = array(
					'params' => array(
						'key' => $this->key_api,
						'cmd' => 'DeletelRecord',
						'data' => array(
							'id_record' =>  $id_record,
							'id_zone' =>  $id_zone,
							'id_clients' => $this->id_client, 
						)
					)
				);
				$results = $this->rest->post('apps/api/record',$params_create_news_record);
				$remove_action = $results->results->message->code;
				if($remove_action==2030){
					$this->ZoneUpdate($id_zone);
					redirect(base_url('cms'));
				}else{
					redirect(base_url('cms'));
				}
				die;
				
			}else{
				redirect(base_url('exits'));
			}
		}else{
			redirect(base_url('exits'));
		}
	}

	public function loadZoneClients(){
		$params_create_encrypt = array(
			'params' => $this->id_client,
		);
		$encrypt  = $this->rest->post('apps/api/encrypt',$params_create_encrypt);
		$params_InfoZone_zone = array(
			'params' => array(
				'key' => $this->key_api,
				'cmd' => 'InfoZones',
				'data' => array(
					'id_clients'  => $encrypt->results,
				)
			)
		);
		$response = $this->rest->post('apps/api/zone',$params_InfoZone_zone);
		if(!empty($response)){
			echo json_encode($response->results);
		}else{
			$results = $this->AddnewZone();
			if(!empty($results)){
				return redirect(base_url().'cms');
			}else{
				return redirect(base_url().'exits');
			}
		}
		
	}
	
	private function AddnewZone(){
		$params_create_news_zone = array(
				'params' => array(
					'key' => $this->key_api,
					'cmd' => 'CreateNewZone',
					'data' => array(
							'name_zone'  => $this->user_domain,
							'client_id'  => $this->id_client,
							'auth'  => sha1($this->user_domain),
						)
				)
			);
		$results = $this->rest->post('apps/api/zone',$params_create_news_zone);
		return $results;
	}
	
	private function getInfozone(){
		
	}
	public function index(){
		$msg = '';
		$data = array(
			'msg' => $msg,
			'title'=> 'Control Panel Domain Work Apps',
			'title_main'=> $this->info_company->company->shortcut_name_company,
			'user_domain' => $this->user_domain,
			'id_levels' => $this->id_levels,
		);
		$this->parser->parse('default/header',$data);
		$this->parser->parse('default/sidebar',$data);
		$this->parser->parse('default/cms_dashboard',$data);
		$this->parser->parse('default/footer',$data);
	}
	
	
	
}
?>