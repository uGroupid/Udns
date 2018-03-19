<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(! function_exists('microsecond')){
	function microsecond() {
		 $ts = gettimeofday(true);
		 $ts = sprintf("%.5f", $ts);
		 $s = strftime("%Y-%m-%dT%H:%M:%S", $ts);
		return $s; 
	}
}

if(! function_exists('help_response')){
	function help_response($param) {
		echo json_encode($param);
		header('Content-Type: application/json');
	}
}

if(! function_exists('json_encode_pretty')){
	function json_encode_pretty($obj, $indentation = 0) {
  switch (gettype($obj)) {
    case 'object':
      $obj = get_object_vars($obj);
    case 'array':
      if (!isset($obj[0])) {
        $arr_out = array();
        foreach ($obj as $key => $val) {
          $arr_out[] = '"' . addslashes($key) . '": ' . json_encode_pretty($val, $indentation + 1);
        }
        if (count($arr_out) < 2) {
          return '{' . implode(',', $arr_out) . '}';
        }
        return "{\n" . str_repeat("  ", $indentation + 1) . implode(",\n".str_repeat("  ", $indentation + 1), $arr_out) . "\n" . str_repeat("  ", $indentation) . "}";
      } else {
        $arr_out = array();
        $ct = count($obj);
        for ($j = 0; $j < $ct; $j++) {
          $arr_out[] = json_encode_pretty($obj[$j], $indentation + 1);
        }
        if (count($arr_out) < 2) {
          return '[' . implode(',', $arr_out) . ']';
        }
        return "[\n" . str_repeat("  ", $indentation + 1) . implode(",\n".str_repeat("  ", $indentation + 1), $arr_out) . "\n" . str_repeat("  ", $indentation) . "]";
      }
      break;
    case 'NULL':
      return 'null';
      break;
    case 'boolean':
      return $obj ? 'true' : 'false';
      break;
    case 'integer':
    case 'double':
      return $obj;
      break;
    case 'string':
    default:
      $obj = str_replace(array('\\','"',), array('\\\\','\"'), $obj);
      return '"' . $obj . '"';
      break;
  }
}
}
/////////////////////////////////////
if(! function_exists('core_encrypt_convert')){
	function core_encrypt_convert($string){
		$ci = &get_instance();
		$ci->load->library('encrypt');
		$param = json_encode($string);
			return $ci->encrypt->encode($param);
	}
}
/////////////////////////////////////
if(! function_exists('core_decrypt_convert')){
	function core_decrypt_convert($string){
		$ci = &get_instance();
		$ci->load->library('encrypt');
		$params =  $ci->encrypt->decode($string);
			return json_decode($params);
	}
}
/////////////////////////////////////
// if(! function_exists('validate_label_domain')){
	// function validate_label_domain($label){
		// if (!$label) {
			// return 'You must enter a domain name';
		// }
		// if (strlen($label) > 63) {
			// return 'Total lenght of your domain must be less then 63 characters';
		// }
		// if (strlen($label) < 2) {
			// return 'Total lenght of your domain must be greater then 2 characters';
		// }
		// if (preg_match("/[^A-Z0-9\-]/",$label) {
			// return 'Invalid domain name format';
		// }
		// if (preg_match("/^xn--/",$label) {
			// if (preg_match("/^-|-$|\.$/",$label) {
				// return 'Invalid domain name format, cannot begin or end with a hyphen (-)';
			// }
		// }
		// else {
			// if (preg_match("/^-|--|-$|\.$/",$label) {
				// return 'Invalid domain name format, cannot begin or end with a hyphen (-)';
			// }
		// }
	// }
// }

if(! function_exists('debug')){
	function debug($array){
		echo '<pre>';
			print_r($array);
		echo '</pre>';
	}
}
/////////////////////////////////////
if(! function_exists('debug_dump')){
	function debug_dump($array){
		echo '<pre>';
			var_dump($array);
		echo '</pre>';
	}
}
/////////////////////////////////////
if(! function_exists('core_token_csrf')){
	function core_token_csrf(){
		$ci = &get_instance();
			return $ci->security->get_csrf_hash();
	}
}
/////////////////////////////////////
if(! function_exists('core_csrf_name')){
	function core_csrf_name(){
		$ci = &get_instance();
			return $ci->security->get_csrf_token_name();
	}
}
/////////////////////////////////////
if(! function_exists('core_encode')){
	function core_encode($str){
		$encode_str = urlencode(base64_encode(core_encrypt($str)));
			return $encode_str;
	}
}
/////////////////////////////////////
if(! function_exists('core_decode')){
	function core_decode($str){
		$decode_str = core_decrypt(base64_decode(urldecode($str)));
			return $decode_str;
	}
}
/////////////////////////////////////
if(! function_exists('url_base64_encode')){
	function url_base64_encode($str){
		return urlencode(base64_encode($str));
	}
}
/////////////////////////////////////
if(! function_exists('url_base64_decode')){
	function url_base64_decode($str){
		return base64_decode(urldecode($str));
	}
}
/////////////////////////////////////
if(! function_exists('core_encrypt')){
	function core_encrypt($string){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->encode($string);
	}
}
/////////////////////////////////////
if(! function_exists('core_decrypt')){
	function core_decrypt($string){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->decode($string);
	}
}
/////////////////////////////////////
if(! function_exists('core_path_logs')){
	function core_path_logs($directory){
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
/////////////////////////////////////
if ( ! function_exists('core_logs')){
	function core_logs($msg = null) {
		$ci = & get_instance();
		$logs_handesk = array(
			'header' => $ci->session->all_userdata(),
			'content' => $msg,
		);
		file_put_contents(core_path_logs($ci->router->fetch_class()).'/'.$ci->router->fetch_method().'-'.date("d-m-Y",time()).".txt", date("d/m/Y H:i:s",time()).": ".print_r($logs_handesk, TRUE)."\n", FILE_APPEND | LOCK_EX);
	}
}
/////////////////////////////////////
if ( ! function_exists('create_ssl')){
	function create_ssl($dn,$name_file) {
		$configs = array(
				"digest_alg" => "sha512",
				"private_key_bits" => 4096,
				"private_key_type" => OPENSSL_KEYTYPE_RSA,
		);
		$path = fpath_ssl();
		$name_token = random_name_ssl();
		$name_path_key_ssl = $path.'/'.$name_file.'_'.$name_token.'.key';
		$name_path_crt_ssl = $path.'/'.$name_file.'_'.$name_token.'.crt';
		$name_path_csr_ssl = $path.'/'.$name_file.'_'.$name_token.'.csr';
		$privkey = openssl_pkey_new($configs);
		$csr = openssl_csr_new($dn, $privkey);
		$sscert = openssl_csr_sign($csr, null, $privkey, 365);
		$key_ssl = openssl_pkey_export_to_file($privkey, $name_path_key_ssl,NULL);
		$crt_ssl = openssl_x509_export_to_file($sscert,  $name_path_crt_ssl,  FALSE);
		$csr_ssl = openssl_csr_export_to_file($csr, $name_path_csr_ssl);
		$response = array(
			'key_ssl' => array($key_ssl,$name_path_key_ssl),
			'crt_ssl' => array($crt_ssl,$name_path_crt_ssl),
			'csr_ssl' => array($csr_ssl,$name_path_csr_ssl),
			'dn' => $dn,
		);
		return $response;
	}
}
if ( ! function_exists('fpath_ssl')){
	function fpath_ssl() {
			$dir = FCPATH .'certificate/crt_ssl/'.date('Y'). '/' . date('m'). '/' . date('d');
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
 if(! function_exists('random_name_ssl')){
    function random_name_ssl(){
		$length = 18;
		$lengthc = 12;
		$randoms = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$username = md5(sha1("SSL_SIGN_UGROUPS-".$randomc.time().$randoms));
		return $username;
    }
  }
	if(! function_exists('ssl_encrypt')){
		///////////////////// Mã hoá SSL dùng file .key để mã hoá ///////////////
    function ssl_encrypt($priv_key,$string){
			$res = openssl_get_privatekey($priv_key,null);
			openssl_private_encrypt($string,$crypttext,$res);
			return $crypttext;
    }
  }
	if(! function_exists('ssl_decrypt')){ 
		////////////////// Giải Mã SSL Dùng File .crt để Giải mã //////////////
    function ssl_decrypt($pub_key,$string){
			openssl_get_publickey($pub_key);
			openssl_public_decrypt($string,$decrypttext,$pub_key);
			return $decrypttext;
    }
  }
	if(! function_exists('ssl_read_file')){
    function ssl_read_file($file_name){
			$fps=fopen ($file_name,"r");
			$pub_key=fread($fps,8192);
			fclose($fps);
			return $pub_key;
    }
  }
//////////////////////////////////////
