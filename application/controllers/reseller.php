<?php
class Reseller extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		$config =  array('server' => 'http://192.168.1.221/apps',);
		$this->rest->initialize($config);
		$param_company = array('params' =>$_SERVER['HTTP_HOST'],);
		$this->info_company = $this->rest->get('apps/api/company_info',$param_company);
		$this->key_api = $this->info_company->key_api;
		if($this->info_company == true){
			
		}else{
			redirect(base_url('exit'));
		}
		$check_session = $this->session->userdata('auth_login');
		if($check_session==true){
			return redirect(base_url('cms'));
		}
		
	}
	protected function convert_string($string){
		$str = trim(strtolower($string));
		$str = str_replace(" ","",$str);
		return $str;
	}
	private function punny_code($domain_name){
		mb_internal_encoding('utf-8');
		$Punycode = new Idna_convert();
		$domain_name_space = $Punycode->encode($domain_name);
		return $domain_name_space;
	}
	public function sign_up(){
		$domain_string = $this->input->post('domain_name');
		$email_string =  $this->input->post('email');
		if($domain_string != '' || $domain_string != null){
			if($domain_string != '' || $domain_string != null){
				$domain = $this->convert_string($domain_string);
				$email = $this->convert_string($email_string);
				$domain_name = $this->punny_code($domain);
				$password = random_pass();
				$params_create_news_clients = array(
					'params' => array(
						'key' => $this->key_api,
						'cmd' => 'CreateNewClients',
						'data' => array(
								'username'  => $domain_name,
								'user_domain'  => $domain_name,
								'password'  => $password,
								'email'  => $email,
								'phone'  => $this->info_company->company->shortcut_phone,
								'auth'  => sha1($domain_name),
							)
					)
				);
				$results = $this->rest->post('apps/api/client',$params_create_news_clients);
				if(isset($results)==true){
					$msg = '';
					$data = array(
						'results' => json_encode($results),
						'params_create' => $params_create_news_clients,
						'msg' => $msg,
						'title'=> 'Control Panel Domain Work Apps',
					);
					$this->parser->parse('default/header_sign',$data);
					$this->parser->parse('default/reseller_results',$data);
					$this->parser->parse('default/footer_sign',$data);
					$code = $results->results->message->code;
					if($code==1000){
						date_default_timezone_set('Asia/Ho_Chi_Minh');
							$info = "Support@uGroup.asia";
							$this->load->library('email');
							$time = time();
							$ngay = date("Y-m-d",$time);
							$subject = 'DNS Management Information Domain is ' .$domain_name;
							$body ='<div  style="margin: 20px auto; float: left;">
							<h3 style="text-align: center; font-size: 34px; color: rgb(200, 12, 12);"> DNS Management Information !</h3>
							<div  style="float: left; padding-left: 22px; font-size: 16px; font-family: arial;">
								<p style="padding-left: 87px;">Dear Customer, Thank you for using our service </p>
								<p>Your domain name DNS administrative information is</p></br>
								<p>Links Login: <a href="'.base_url().'sign"> '.base_url().'sign </a></p></br>
								<p> Login Account :   '. $domain_name.'</p></br>
								<p> Login Password :  '. $password.'</p></br>
								<p>Sincerely thank you.</p>
								<p>
								Every Master has kindly offer you Submit About Email support@ugroup.asia
								Or pick up a call Call Center (+84) 123-7711-777 or (+84) 124-7744-777  </p>
							</div>
							</div>';
							$this->email->from('notifications-center@ugroup.asia')->to($email)->cc('support@ugroup.asia')->cc('info@ugroup.asia')->cc('support@ureg.asia')->cc('notifacation.udns@gmail.com')->subject($subject)->message($body)->send();
					}
					
				}else{
					redirect(base_url().'reseller');
				}
			}else{
				$msg = 'Email is Null';
				$data = array(
					'results' => null,
					'msg' => $msg,
					'title'=> 'Control Panel Domain Work Apps',
				);
				$this->parser->parse('default/header_sign',$data);
				$this->parser->parse('default/reseller_results',$data);
				$this->parser->parse('default/footer_sign',$data);
			}
			
		}else{
			$msg = 'Domain Is Null';
			$data = array(
				'results' => null,
				'msg' => $msg,
				'title'=> 'Control Panel Domain Work Apps',
			);
			$this->parser->parse('default/header_sign',$data);
			$this->parser->parse('default/reseller_results',$data);
			$this->parser->parse('default/footer_sign',$data);
		}
		
	}
	
	public  function index(){
		$msg = '';
		$data = array(
			'msg' => $msg,
			'title'=> 'Control Panel Domain Work Apps',
		);
		$this->parser->parse('default/header_sign',$data);
		$this->parser->parse('default/Dotvn_reseller',$data);
		$this->parser->parse('default/footer_sign',$data);
	}	
}
?>