<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function query_global($sql){
    
    $CI = get_instance();
    $CI->load->model('global_model');
	return $CI->global_model->query_global($sql);
}


if(! function_exists('check_domain_data_hitek')){
    function check_domain_data_hitek($domain){
			$sql = "SELECT domain_name
					FROM tbl_domain
					WHERE domain_name = '$domain' and active = 1";	
			$result = query_global($sql);
			if($result == true){
				return true;
			}else{
				return false;
			}
    }
}
if(! function_exists('check_domain_data_hitek_jobs')){
    function check_domain_data_hitek_jobs($domain){
			$sql = "SELECT domain_name
					FROM hitek_jobs_domain_notify
					WHERE domain_name = '$domain' 
					AND status = 1
					";	
			$result = query_global($sql);
			if($result == true){
				return true;
			}else{
				return false;
			}
    }
}