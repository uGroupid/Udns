<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 if(! function_exists('json')){
    function json($array){
       header('Content-Type=> application/json');
       echo json_encode($array);
    }
  }
 
  if(! function_exists('Extend_Domain')){
    function Extend_Domain($domain_name){
      $exteds = explode(".",$domain_name); 
		$i = count($exteds);
		$extends = null;
		if($i<=2){
			$extends = '.'.$exteds[1];
		}
		if($i>2){
			$extends = '.'.$exteds[1].'.'.$exteds[2];
		}
		return $extends;
    }
  }
 if(! function_exists('validateDomainName')){
    function validateDomainName($value)
	{
		$pattern = '/^([a-z0-9]([-a-z0-9]*[a-z0-9])?\.)+(vn)$/';
		preg_match($pattern, $value, $matches);
		return $matches;
		
	}
  } 
  if(! function_exists('ejson')){
    function ejson($array){
       header('Content-Type=> application/json');
       return json_encode($array);
    }
  }
	
    if(! function_exists('lookup2')){
    function lookup2( $domain )
		{
			$url = 'http://whois.pavietnam.net/whois.php?cmd=registrarinfo&domain='.$domain;
			$options = array(
				CURLOPT_RETURNTRANSFER => true,     // return web page
				CURLOPT_HEADER         => false,    // don't return headers
				//CURLOPT_FOLLOWLOCATION => true,   // follow redirects
				CURLOPT_ENCODING       => "",       // handle all encodings
				CURLOPT_USERAGENT      => "spider", // who am i
				CURLOPT_AUTOREFERER    => true,     // set referer on redirect
				CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
				CURLOPT_TIMEOUT        => 120,      // timeout on response
				CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
				CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
			);

			$ch      = curl_init( $url );
			curl_setopt_array( $ch, $options );
			$content = curl_exec( $ch );
			$err     = curl_errno( $ch );
			$errmsg  = curl_error( $ch );
			$header  = curl_getinfo( $ch );
			curl_close( $ch );
			$header['errno']   = $err;
			$header['errmsg']  = $errmsg;
			$header['content'] = $content;
			return json_decode($content, true);
	}
  }
  if(! function_exists('lookup')){
    function lookup( $domain )
		{
			$url = 'https://whois.inet.vn/whois?domain'.$domain;
			$options = array(
				CURLOPT_RETURNTRANSFER => true,     // return web page
				CURLOPT_HEADER         => false,    // don't return headers
				CURLOPT_ENCODING       => "",       // handle all encodings
				CURLOPT_USERAGENT      => "spider", // who am i
				CURLOPT_AUTOREFERER    => true,     // set referer on redirect
				CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
				CURLOPT_TIMEOUT        => 120,      // timeout on response
				CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
				CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
			);

			$ch      = curl_init( $url );
			curl_setopt_array( $ch, $options );
			$content = curl_exec( $ch );
			$err     = curl_errno( $ch );
			$errmsg  = curl_error( $ch );
			$header  = curl_getinfo( $ch );
			curl_close( $ch );
			$header['errno']   = $err;
			$header['errmsg']  = $errmsg;
			$header['content'] = $content;
			return $content;
	}
  }
    if(! function_exists('vnnic_check')){
     function vnnic_check($string){
			$domain = trim($string);
			$secure_id = 4321;
			$result = file_get_contents("https://whoisregistrar-srs.vnnic.vn/check_domain.jsp?secure_id=4321&domain=".$domain);
			$text_result = htmlspecialchars($result);
			$data = str_replace('&lt;html&gt;', '', $text_result);
			$data1 = str_replace('&lt;head&gt;', '', $data);
			$data2 = str_replace('&lt;title&gt;Check the existing of a domain&lt;/title&gt;', '', $data1);
			$data3 = str_replace('&lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/HTML; charset=UTF-8&quot;&gt;', '', $data2);
			$data4 = str_replace('&lt;/head&gt;', '', $data3);
			$data5 = str_replace('&lt;body&gt;', '', $data4);
			$data6 = str_replace('&lt;/body&gt;', '', $data5);
			$data7 = str_replace('&lt;/html&gt;', '', $data6);
			$result_code = str_replace(" ", "", $data7);
			$str = str_replace('=', '|', $result_code);
			$array = explode("|", $str);
			$code = trim($array[1]); 
			if($code == 'Yes'){
				return 0;
			}else{
				return 1;
			}
		}
  }
	
	if(! function_exists('vnnic_check_idn_keyword')){
    function vnnic_check_idn_keyword($domain_name){
			define('VNNIC_COOKIE', 'vnnic_cookie'); 
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://whois.vnnic.vn/tmtv/jsp/whois.jsp");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_REFERER, 'http://whois.vnnic.vn/tmtv/jsp/whois.jsp');
			curl_setopt($ch, CURLOPT_COOKIEJAR, VNNIC_COOKIE);
			//curl_setopt($ch, CURLOPT_COOKIEFILE, VNNIC_COOKIE);
			$result = curl_exec($ch);
			$html = str_get_html($result);
			foreach($html->find('table tbody tr') as $row) {
				$rowData = array();
				foreach($row->find('td input') as $cell) {
					$rowData[] = $cell->value;
				}
				$theData[]= $rowData;
			}
			$random = $theData[2][0];
			$postData = "randomString=$random&textDomainVN=$domain_name";
			$url='http://whois.vnnic.vn/tmtv/jsp/searchDomainVN.jsp';
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); 
			curl_setopt($ch, CURLOPT_COOKIEJAR, VNNIC_COOKIE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			$output=curl_exec($ch);
			$html = str_get_html($output);
			foreach($html->find('table tr') as $row) {
				$rowData = array();
				foreach($row->find('td ') as $cell) {
					$rowData[] = $cell->innertext;
				}
				$theData[]= $rowData;
			}
			if(isset($theData[5][0])) {
				$check_domain =  strlen($theData[5][0]); 
			}else{
				$check_domain = 0;
			}
			
			if($check_domain == 112){
				return 2;
			}else if($check_domain == 6){
				return  1;
			}else{
				return  0;
			}
		}
  }
	if(! function_exists('vnnic_check_idn')){
		function vnnic_check_idn($domain){
			$context = stream_context_create();
			stream_context_set_option($context, 'ssl', 'local_cert','/var/www/clients/client0/web3/web/tmtv/whoisvnnic.pem');
			stream_context_set_option($context, 'ssl', 'passphrase','112233fF');
			stream_context_set_option($context, 'ssl', 'allow_self_signed',FALSE);
			stream_context_set_option($context, 'ssl', 'verify_peer', FALSE);
			$whoisService_client = new SoapClient('https://whoisservice.vnnic.vn/whoisidn/WhoisTMTVServicePort?wsdl', array('stream_context' => $context, 'cache_wsdl' => WSDL_CACHE_NONE));
			$result = $whoisService_client->checkDomain(array ('domainname' => $domain));
			if ($result->checkResult->available){
				return $result->checkResult->available;
			}else {
				return $result->checkResult->available;
			}
		}
	}
	if(! function_exists('vnnic_info_idn')){
		function vnnic_info_idn($domain){
			$context = stream_context_create();
			stream_context_set_option($context, 'ssl', 'local_cert','/var/www/clients/client0/web3/web/tmtv/whoisvnnic.pem');
			stream_context_set_option($context, 'ssl', 'passphrase','112233fF');
			stream_context_set_option($context, 'ssl', 'allow_self_signed',FALSE);
			stream_context_set_option($context, 'ssl', 'verify_peer', FALSE);
			$whoisService_client = new SoapClient('https://whoisservice.vnnic.vn/whoisidn/WhoisTMTVServicePort?wsdl', array('stream_context' => $context, 'cache_wsdl' => WSDL_CACHE_NONE));
			return $whoisService_client->infoDomain(array ('domainname' => $domain));
		}
	}
  if(! function_exists('whois')){
     function whois($string){
			$domain = trim($string);
			$url = 'http://whois.pavietnam.net/whois.php?domain='.$domain;
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			//curl_setopt($ch,CURLOPT_POST,count($fields));
			//curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			return $result;
	}
  }
  
  
 if(! function_exists('debug')){
    function debug($array){
      echo '<pre>';
	  print_r($array);
      echo '</pre>';
	  die;
    }
  }
  if(! function_exists('debug_dump')){
    function debug_dump($array){
      echo '<pre>';
	  var_dump($array);
      echo '</pre>';
	 
    }
  }
if(! function_exists('view_date')){
  function view_date(){
    
    return date('Y-m-d');
  }
}
 if(! function_exists('token_csrf')){
    function token_csrf(){
       $ci = &get_instance();
       return $ci->security->get_csrf_hash();
    }
  }
  if(! function_exists('csrf_name')){
    function csrf_name(){
      $ci = &get_instance();
      return $ci->security->get_csrf_token_name();
    }
  }

if(! function_exists('handesk_encode')){
  function handesk_encode($str){
    $encode_str = urlencode(base64_encode(encrypt($str)));
   return $encode_str;
  }
}
if(! function_exists('handesk_decode')){
  function handesk_decode($str){
    $decode_str = decrypt(base64_decode(urldecode($str)));
    return $decode_str;
  }
}
if(! function_exists('url_base64_encode')){
  function url_base64_encode($str){
    
    $encode_str = base64_encode($str);
    return urlencode($encode_str);
  }
}
if(! function_exists('url_base64_decode')){
  function url_base64_decode($str){
     
    return base64_decode(urldecode($str));
  }
}
if(! function_exists('removedot')){
  function removedot($string){
     
    return preg_replace('/([a-z]+)\.([^\s])/i', '$1. $2', $string);
  }
}
if(! function_exists('url_encoded')){
 function url_encoded($str){
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
          return $str;
    }
}
  if(! function_exists('encrypt')){
    function encrypt($string){
       $ci = &get_instance();
       $ci->load->library('encrypt');
       return $ci->encrypt->encode($string);
    }
  }
  if(! function_exists('decrypt')){
    function decrypt($string){
       $ci = &get_instance();
       $ci->load->library('encrypt');
       return $ci->encrypt->decode($string);
    }
  }

   if(! function_exists('random_pass')){
    function random_pass(){
		$length = 8;
		$rand_pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		return $rand_pass;
    }
  }
  if(! function_exists('random_username')){
    function random_username(){
		$length = 4;
		$lengthc = 2;
		$randoms = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$username = "ITVN-".$randoms.time().$randomc;
		return $username;
    }
  }
  if(! function_exists('random_otp')){
    function random_otp(){
		$length = 4;
		$lengthc = 2;
		$randoms = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$username = "ITORC".$randomc.time().$randoms;
		return $username;
    }
  }
  if(! function_exists('code_orderstmtv')){
    function code_orderstmtv(){
		$length = 6;
		$lengthc = 8;
		$randoms = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$code_orders = "ITVNTMTV".$randomc.time().$randoms.'-'.time();
		return $code_orders;
    }
  }
	 if(! function_exists('account_transfer_code')){
    function account_transfer_code(){
		$length = 4;
		$lengthc = 4;
		$randoms = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$username = "AT-".$randomc.time().$randoms;
		return $username;
    }
  }
  if(! function_exists('code_orders')){
    function code_orders($id){
		$length = 6;
		$lengthc = 8;
		$randoms = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$code_orders = "ITVNORD".$randomc.time().$id.$randoms.'-'.time();
		return $code_orders;
    }
  }
  if(! function_exists('id_contact_random')){
    function id_contact_random($id){
		$lengthc = 6;
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$code_orders = "HITEK-".$randomc.$id.'-'.time();
		return $code_orders;
    }
  }
  if(! function_exists('random_otps')){
    function random_otps(){
		$length = 4;
		$lengthc = 2;
		$randoms = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$username = $randomc.time().$randoms;
		return $username;
    }
  }
  if(! function_exists('create_path')){
	  function create_path(){
		$dir = FCPATH .'/public/logs/'.date('Y'). '/' . date('m'). '/' . date('d');
		$create_path_month = FCPATH .'/public/logs/'.date('Y'). '/' . date('m');
		$create_path_years = FCPATH .'/public/logs/'.date('Y');
		if(!is_dir($dir)){
		  umask(0);
		   mkdir($dir, 0777, true);
		  return $dir;
		  
		}else{
		  umask(0);
		  return $dir;
		}
	  }
	}
	 if(! function_exists('handesk_path_system_logs')){
	  function handesk_path_system_logs($directory){
		$dir = FCPATH .'/logs/'.$directory.'/'.date('Y'). '/' . date('m'). '/' . date('d');
		$create_path_month = FCPATH .'/logs/'.$directory.'/'.date('Y'). '/' . date('m');
		$create_path_years = FCPATH .'/logs/'.$directory.'/'.date('Y');
		if(!is_dir($dir)){
		  umask(0);
		   mkdir($dir, 0777, true);
		  return $dir;
		  
		}else{
		  umask(0);
		  return $dir;
		}
	  }
	}
	if ( ! function_exists('handesk_logs')){
	  function handesk_logs($msg = null) {
			$ci = & get_instance();
			$logs_handesk = array(
			'header' => $ci->session->all_userdata(),
			'content' => $msg,
		);
			file_put_contents(handesk_path_system_logs($ci->router->fetch_class()).'/'.$ci->router->fetch_method().'-'.date("d-m-Y",time()).".txt", date("d/m/Y H:i:s",time()).": ".print_r($logs_handesk, TRUE)."\n", FILE_APPEND | LOCK_EX);
	  }
	}
	if ( ! function_exists('logscontact')){
	  function logscontact($file,$msg) {
		file_put_contents(create_path().'/'.$file.'-'.date("d-m-Y",time()).".txt", $msg."\n", FILE_APPEND | LOCK_EX);
	  }
	}
	if ( ! function_exists('logsdb')){
	  function logsdb($file,$msg) {
		file_put_contents(create_path().'/'.$file.'-'.date("d-m-Y",time()).".txt", print_r($msg, TRUE)."\n", FILE_APPEND | LOCK_EX);
	  }
	}
	if ( ! function_exists('logs')){
	  function logs($file,$msg) {
		file_put_contents(create_path().'/'.$file.'-'.date("d-m-Y",time()).".txt", date("d/m/Y H:i:s",time()).": ".print_r($msg, TRUE)."\n", FILE_APPEND | LOCK_EX);
	  }
	}
	if ( ! function_exists('warring_hacker')){
	  function warring_hacker() {
		return redirect(base_url()."dashboard/logout");
	  }
	}
	if ( ! function_exists('epp_domain_dump')){
	 function epp_domain_dump($response){
		$sxe = new SimpleXMLElement($response);
		$code = (string)$sxe->response->result->code;
		if($code = 1000){
			$sxe->registerXPathNamespace('domain', 'urn:ietf:params:xml:ns:domain-1.0');
			$domain_name = $sxe->xpath('//domain:name');
			$domain_roid = $sxe->xpath('//domain:roid');
			$domain_registrant = $sxe->xpath('//domain:registrant');
			$domain_contact_admin = $sxe->xpath('//domain:contact[@type="admin"]');
			$domain_contact_tech = $sxe->xpath('//domain:contact[@type="tech"]');
			$domain_contact_billing = $sxe->xpath('//domain:contact[@type="billing"]');
			///////////
			$domain_clientTransfer = $sxe->xpath('//domain:status[@s="clientTransferProhibited"]');
			$domain_clientHold = $sxe->xpath('//domain:status[@s="clientHold"]');
			$domain_clientRenew = $sxe->xpath('//domain:status[@s="clientRenewProhibited"]');
			$domain_clientUpdate = $sxe->xpath('//domain:status[@s="clientUpdateProhibited"]');
			$domain_ok = $sxe->xpath('//domain:status[@s="ok"]');
			$domain_pendingDelete = $sxe->xpath('//domain:status[@s="pendingDelete"]');
			$domain_pendingUpdate = $sxe->xpath('//domain:status[@s="pendingUpdate"]');
			$domain_pendingCreate = $sxe->xpath('//domain:status[@s="pendingCreate"]');
			$domain_pendingRenew = $sxe->xpath('//domain:status[@s="pendingRenew"]');
			$domain_pendingRestore = $sxe->xpath('//domain:status[@s="pendingRestore"]');
			$domain_pendingTransfer = $sxe->xpath('//domain:status[@s="pendingTransfer"]');
			$domain_redemptionPeriod = $sxe->xpath('//domain:status[@s="redemptionPeriod"]');
			$domain_renewPeriod = $sxe->xpath('//domain:status[@s="renewPeriod"]');
			$domain_transferPeriod = $sxe->xpath('//domain:status[@s="transferPeriod"]');
			/////////
			$domain_serverHold = $sxe->xpath('//domain:status[@s="serverHold"]');
			$domain_serverUpdate = $sxe->xpath('//domain:status[@s="serverUpdateProhibited"]');
			$domain_serverDelete = $sxe->xpath('//domain:status[@s="serverDeleteProhibited"]');
			$domain_serverTransfer = $sxe->xpath('//domain:status[@s="serverTransferProhibited"]');
			$domain_serverinactive = $sxe->xpath('//domain:status[@s="inactive"]');
			//////////
			$domain_pw = $sxe->xpath('//domain:pw');
			$domain_clID = $sxe->xpath('//domain:clID');
			$domain_crID = $sxe->xpath('//domain:crID');
			$domain_crDate = $sxe->xpath('//domain:crDate');
			$domain_upDate = $sxe->xpath('//domain:upDate');
			$domain_exDate = $sxe->xpath('//domain:exDate');
			$domain_upID = $sxe->xpath('//domain:upID');
			$domain_hostName = $sxe->xpath('//domain:hostName');
			
			$domain_status_regsitry = null;
			$DI_upID = null;
			$domain_status_registra = null;
			if($domain_serverHold){
				$DSserverHold = (string)$domain_serverHold[0]['s'];
				$domain_status_regsitry .= ','.$DSserverHold;
			}
			if($domain_serverUpdate){
				$DSserverUpdate = (string)$domain_serverUpdate[0]['s'];
				$domain_status_regsitry .= ','.$DSserverUpdate;
			}
			if($domain_serverDelete){
				$DSserverDelete = (string)$domain_serverDelete[0]['s'];
				$domain_status_regsitry .= ','.$DSserverDelete;
			}
			if($domain_serverTransfer){
				$DSserverTransfer =(string)$domain_serverTransfer[0]['s'];
				$domain_status_regsitry .= ','.$DSserverTransfer;
			}
			if($domain_serverinactive){
				$DSserverinactive = (string)$domain_serverinactive[0]['s'];
				$domain_status_regsitry .= ','.$DSserverinactive;
			}
			//////////////////////////////////
			if($domain_clientTransfer){
				$CSclientTransfer = (string)$domain_clientTransfer[0]['s'];
				$domain_status_registra .= ','.$CSclientTransfer;
			}
			if($domain_clientHold){
				$CSclientHold = (string)$domain_clientHold[0]['s'];
				$domain_status_registra .= ','.$CSclientHold;
			}
			if($domain_clientRenew){
				$CSclientRenew = (string)$domain_clientRenew[0]['s'];
				$domain_status_registra .= ','.$CSclientRenew;
			}
			if($domain_clientUpdate){
				$CSclientUpdate = (string)$domain_clientUpdate[0]['s'];
				$domain_status_registra .= ','.$CSclientUpdate;
			}
			if($domain_ok){
				$CSok = (string)$domain_ok[0]['s'];
				$domain_status_registra .= ','.$CSok;
			}
			if($domain_pendingDelete){
				$CSpendingDelete = (string)$domain_pendingDelete[0]['s'];
				$domain_status_registra .= ','.$CSpendingDelete;
			}
			if($domain_pendingUpdate){
				$CSpendingUpdate = (string)$domain_pendingUpdate[0]['s'];
				$domain_status_registra .= ','.$CSpendingUpdate;
			}
			if($domain_pendingCreate){
				$CSpendingCreate = (string)$domain_pendingCreate[0]['s'];
				$domain_status_registra .= ','.$CSpendingCreate;
			}
			if($domain_pendingRenew){
				$CSpendingRenew = (string)$domain_pendingRenew[0]['s'];
				$domain_status_registra .= ','.$CSpendingRenew;
			}
			if($domain_pendingRestore){
				$CSpendingRestore = (string)$domain_pendingRestore[0]['s'];
				$domain_status_registra .= ','.$CSpendingRestore;
			}
			if($domain_pendingTransfer){
				$CSpendingTransfer = (string)$domain_pendingTransfer[0]['s'];
				$domain_status_registra .= ','.$CSpendingTransfer;
			}
			if($domain_redemptionPeriod){
				$CSredemptionPeriod = (string)$domain_redemptionPeriod[0]['s'];
				$domain_status_registra .= ','.$CSredemptionPeriod;
			}
			if($domain_renewPeriod){
				$CSrenewPeriod = (string)$domain_renewPeriod[0]['s'];
				$domain_status_registra .= ','.$CSrenewPeriod;
			}
			if($domain_transferPeriod){
				$CStransferPeriod = (string)$domain_transferPeriod[0]['s'];
				$domain_status_registra .= ','.$CStransferPeriod;
			}
			if($domain_upID){
				$DI_upID = (string)$domain_upID[0];
			}
			if(isset($domain_upDate[0])){
				$DI_domain_upDate = date("Y-m-d H:i:s",strtotime((string)$domain_upDate[0]));
			}else{
				$DI_domain_upDate = date("Y-m-d H:i:s",strtotime((string)$domain_crDate[0]));
			}
			
			if(isset($domain_contact_admin[1])){
				$id_contact_admins =  (string)$domain_contact_admin[1];
			}else{
				$id_contact_admins = null;
			}
			$hostname = null;
			if(isset($domain_hostName[0])){
				$hostname .=  (string)$domain_hostName[0];
			}
			if(isset($domain_hostName[1])){
				$hostname .=  ','. (string)$domain_hostName[1];
			}
			if(isset($domain_hostName[2])){
				$hostname .=  ','. (string)$domain_hostName[2];
			}
			if(isset($domain_hostName[3])){
				$hostname .=  ','. (string)$domain_hostName[3];
			}
			if(isset($domain_hostName[4])){
				$hostname .=  ','. (string)$domain_hostName[4];
			}
			if(isset($domain_hostName[5])){
				$hostname .=  ','. (string)$domain_hostName[5];
			}
			if(isset($domain_hostName[6])){
				$hostname .=  ','. (string)$domain_hostName[6];
			}
			if(isset($domain_hostName[7])){
				$hostname .=  ','. (string)$domain_hostName[7];
			}
			if(isset($domain_hostName[8])){
				$hostname .=  ','. (string)$domain_hostName[8];
			}
			if(isset($domain_hostName[9])){
				$hostname .=  ','. (string)$domain_hostName[9];
			}
			if(isset($domain_hostName[10])){
				$hostname .=  ','. (string)$domain_hostName[10];
			}
			if(isset($domain_hostName[11])){
				$hostname .=  ','. (string)$domain_hostName[11];
			}
			if(isset($domain_pw[0])){
				$auth = (string)$domain_pw[0];
			}else{
				$auth = null;
			}
			if(isset($domain_registrant[0])){
				$id_contact_owner =  (string)$domain_registrant[0];
			}else{
				$id_contact_owner = null;
			}
			if(isset($domain_contact_admin[0])){
				$id_contact_admin =  (string)$domain_contact_admin[0];
			}else{
				$id_contact_admin = null;
			}
			if(isset($domain_contact_tech[0])){
				$id_contact_tech =  (string)$domain_contact_tech[0];
			}else{
				$id_contact_tech = null;
			}
			if(isset($domain_contact_billing[0])){
				$id_contact_bill =  (string)$domain_contact_billing[0];
			}else{
				$id_contact_bill = null;
			}
			if(isset($domain_crID[0])){
				$domain_crID =  (string)$domain_crID[0];
			}else{
				$domain_crID = null;
			}
			if(isset($domain_clID[0])){
				$domain_clID =  (string)$domain_clID[0];
			}else{
				$domain_clID = null;
			}
			$domain_data = array(
				'domain_name' => (string)$domain_name[0],
				'domain_roid' => (string)$domain_roid[0],
				'auth_domain' => $auth,
				'domain_crID' => $domain_crID,
				'domain_clID' => $domain_clID,
				'domain_upID' => $DI_upID,
				'domain_crDate' => date("Y-m-d H:i:s",strtotime((string)$domain_crDate[0])),
				'domain_upDate' => $DI_domain_upDate,
				'domain_exDate' => date("Y-m-d H:i:s",strtotime((string)$domain_exDate[0])),
				'domain_hostname' => $hostname,
				'contact_owner' => $id_contact_owner,
				'contact_admin' => $id_contact_admin,
				'contact_admins' => $id_contact_admins,
				'contact_technical' => $id_contact_tech,
				'contact_billing' => $id_contact_bill,
				'domain_status_registra' => $domain_status_registra,
				'domain_status_regsitry' => $domain_status_regsitry,
			);
			return $domain_data;
		}
	} 
	}
	
	
	if ( ! function_exists('epp_contact_dump')){
		function epp_contact_dump($response){
		  $sxe = new SimpleXMLElement($response);
		  $code = (string)$sxe->response->result->code;
		  if($code = 1000){
			  $sxe->registerXPathNamespace('contact', 'urn:ietf:params:xml:ns:contact-1.0');
			  $sxe->registerXPathNamespace('vncontact', 'http://srs.vnnic.vn/epp/extensions/vncontact-1-0');
			  $contact_id = $sxe->xpath('//contact:id');
			  $contact_roid = $sxe->xpath('//contact:roid');
			  $contact_loc = $sxe->xpath('//contact:postalInfo');
			  $contact_vncontact = $sxe->xpath('//vncontact:extInfo');
			  $contact_name = $sxe->xpath('//contact:name');
			  $contact_org = $sxe->xpath('//contact:org');
			  $contact_street = $sxe->xpath('//contact:street');
			  $contact_city = $sxe->xpath('//contact:city');
			  $contact_cc = $sxe->xpath('//contact:cc');
			  $contact_voice = $sxe->xpath('//contact:voice');
			  $contact_fax = $sxe->xpath('//contact:fax');
			  $contact_email = $sxe->xpath('//contact:email');
			  $contact_pw = $sxe->xpath('//contact:pw');
			  $contact_clID = $sxe->xpath('//contact:clID');
			  $contact_crID = $sxe->xpath('//contact:crID');
			  $contact_crDate = $sxe->xpath('//contact:crDate');
			  $contact_upID = $sxe->xpath('//contact:upID');
			  $contact_upDate = $sxe->xpath('//contact:upDate');
			  $contact_disclose = $sxe->xpath('//contact:disclose');
			  $contact_IDPP = $sxe->xpath('//vncontact:IDPP');
			  $contact_gender = $sxe->xpath('//vncontact:gender');
			  $contact_birthDate = $sxe->xpath('//vncontact:birthDate');
			  $contact_position = $sxe->xpath('//vncontact:position');
			  $contact_intTraName = $sxe->xpath('//vncontact:intTraName');
			  if(isset($contact_loc[0]['type'])){
				  $postalInfo = (string)$contact_loc[0]['type'];
			  }else{
				  $postalInfo = null;
			  } 
			  if(isset($contact_loc[0]['type'])){
				  $extInfo = (string)$contact_vncontact[0]['type'];
			  }else{
				  $extInfo = null;
			  }
			  if(isset($contact_name[0])){
				  $name = (string)$contact_name[0];
			  }else{
				  $name = null;
			  }
			  if(isset($contact_org[0])){
				  $org = (string)$contact_org[0];
			  }else{
				  $org = null;
			  }
			  if(isset($contact_street[0])){
				  $street = (string)$contact_street[0];
			  }else{
				  $street = null;
			  }
			  if(isset($contact_city[0])){
				  $city = (string)$contact_city[0];
			  }else{
				  $city = null;
			  }
			  if(isset($contact_cc[0])){
				  $cc = (string)$contact_cc[0];
			  }else{
				  $cc = null;
			  } 
			  if(isset($contact_voice[0])){
				  $voice = (string)$contact_voice[0];
				  $voice = str_replace('-', '', $voice);
				  $voice = str_replace('.', '', $voice);
				  $voice = str_replace('-', '', $voice);
				  $voice = str_replace(' ', '', $voice);
				  $voice = str_replace('(', '', $voice);
				  $voice = str_replace(')', '', $voice);
				  $voice = str_replace(';', '', $voice);
				  $voice = str_replace('$', '', $voice);
				  $voice = str_replace('#', '', $voice);
				  $voice = str_replace('&', '', $voice);
				  $voice = str_replace('*', '', $voice);
				  $voice = str_replace('@', '', $voice);
				  $voice = str_replace('!', '', $voice);
			  }else{
				  $voice = null;
			  } 
			  if(isset($contact_fax[0])){
				  $fax = (string)$contact_fax[0];
				  $fax = str_replace('-', '', $fax);
				  $fax = str_replace('.', '', $fax);
				  $fax = str_replace('-', '', $fax);
				  $fax = str_replace(' ', '', $fax);
				  $fax = str_replace('(', '', $fax);
				  $fax = str_replace(')', '', $fax);
				  $fax = str_replace(';', '', $fax);
				  $fax = str_replace('$', '', $fax);
				  $fax = str_replace('#', '', $fax);
				  $fax = str_replace('&', '', $fax);
				  $fax = str_replace('*', '', $fax);
				  $fax = str_replace('@', '', $fax);
				  $fax = str_replace('!', '', $fax);
			  }else{
				  $fax = null;
			  }
			  if(isset($contact_email[0])){
				  $email = (string)$contact_email[0];
			  }else{
				  $email = null;
			  }
			  if(isset($contact_pw[0])){
				  $auth = (string)$contact_pw[0];
			  }else{
				  $auth = null;
			  } 
			  if(isset($contact_disclose[0]['flag'])){
				  $disclose = (string)$contact_disclose[0];
			  }else{
				  $disclose = null;
			  } 
			  if(isset($contact_IDPP[0])){
				  $IDPP = (string)$contact_IDPP[0];
			  }else{
				  $IDPP = null;
			  }
			  if(isset($contact_gender[0])){
				  $gender = (string)$contact_gender[0];
			  }else{
				  $gender = null;
			  } 
			  if(isset($contact_position[0])){
				  $position = (string)$contact_position[0];
			  }else{
				  $position = null;
			  }
			  if(isset($contact_intTraName[0])){
				  $intTraName = (string)$contact_intTraName[0];
			  }else{
				  $intTraName = null;
			  }
			  if(isset($contact_birthDate[0])){
				  $birthDate = (string)$contact_birthDate[0];
			  }else{
				  $birthDate = null;
			  }  
			  if(isset($contact_clID[0])){
				  $clID = (string)$contact_clID[0];
			  }else{
				  $clID = null;
			  }
			  if(isset($contact_crID[0])){
				  $crID = (string)$contact_crID[0];
			  }else{
				  $crID = null;
			  }
			  if(isset($contact_crDate[0])){
				  $crDates = (string)$contact_crDate[0];
				  $crDate = date("Y-m-d h:i:s",strtotime($crDates));
			  }else{
				  $crDate = null;
			  } 
			  if(isset($contact_upID[0])){
				  $upID = (string)$contact_upID[0];
				 
			  }else{
				  $upID = null;
			  }
			  if(isset($contact_upDate[0])){
				  $upDates = (string)$contact_upDate[0];
				  $upDate = date("Y-m-d h:i:s",strtotime($upDates));
			  }else{
				  $upDate = null;
			  }
			  $data_Contact = array(
				'contact_id' => (string)$contact_id[0],
				'contact_roid' => (string)$contact_roid[0],
				'contact_postalinfo' => $postalInfo,
				'contact_extInfo' => $extInfo,
				'contact_owner' => $name,
				'contact_organization' => $org,
				'contact_abbreviation' => $intTraName,
				'contact_street' => $street,
				'contact_city' => $city,
				'contact_country' => $cc,
				'contact_phone' => $voice,
				'contact_fax' => $fax,
				'contact_email' => $email,
				'contact_auth' => $auth,
				'contact_disclose' => $disclose,
				'contact_passport' => $IDPP,
				'contact_sex' => $gender,
				'contact_position' => $position,
				'contact_birthdate' => $birthDate,
				'contact_clid' => $clID,
				'contact_crid' => $crID,
				'contact_crdate' => $crDate,
				'contact_upid' => $upID,
				'contact_update' => $upDate,
				
			  );
		  
				return $data_Contact;
			}
		}
		
	}