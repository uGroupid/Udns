<?php 
include_once(__DIR__ ."/htmldom_helper.php");
class Helper {

    protected function getCURL($url){
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result=curl_exec($ch);
        curl_close($ch);
        return $result;
    }
	public function crawler_run($url,$namespace,$element){
		
			$html = $this->getCURL($url);
			$output=array();
			$string = $this->str_get_html($html);
			
			if($namespace==1){
				$list = $string->find('#'.$element);
			}else{
				$list = $string->find('.'.$element);
			}
			$i=1;
		
			foreach ($list as $key => $val){
				 $text = $this->regex_word($url,$val->innertext);
				 return $this->regex_alt($text);
			}
	
	}
	private function regex_alt($text){
		preg_match('/alt="([^"]*)"/s', $text, $matches_alt);
		if(!isset($matches_alt[1])){	
			$alt = '';
		}else{
		
			$alt = $matches_alt[1];
		}
		$text = preg_replace('/(<img[^>]+>)/','<table align="center" border="0" cellpadding="3" cellspacing="0" class="tplCaption" style="width: 100%;"><tbody><tr><td>$1</td></tr><tr><td><p class="Image">'.$alt.'</p></td></tr></tbody></table>',$text);
		
		return $text;
	}
	public function file_get_html($url, $use_include_path = false, $context=null, $offset = -1, $maxLen=-1, $lowercase = true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT)
	{
		$dom = new simple_html_dom(null, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
		$contents = file_get_contents($url, $use_include_path, $context, $offset);
	
		if (empty($contents) || strlen($contents) > MAX_FILE_SIZE)
		{
			return false;
		}
		$dom->load($contents, $lowercase, $stripRN);
		return $dom;
	}

	public function str_get_html($str, $lowercase=true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT)
	{
		$dom = new simple_html_dom(null, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
		if (empty($str) || strlen($str) > MAX_FILE_SIZE)
		{
			$dom->clear();
			return false;
		}
		$dom->load($str, $lowercase, $stripRN);
		return $dom;
	}

	
	public function dump_html_tree($node, $show_attr=true, $deep=0)
	{
		$node->dump($node);
	}

    protected function regex_word($url,$text, $allowed_tags = '<img>,<p>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<h7>,<u>,<b>,<ul>,<li>,<br>,<hr>')
	{
		mb_regex_encoding('UTF-8');
		$search = array('/&lsquo;/u', '/&rsquo;/u', '/&ldquo;/u', '/&rdquo;/u', '/&mdash;/u');
		if(mb_stripos($text, '/*') !== FALSE){
			$text = mb_eregi_replace('#/\*.*?\*/#s', '', $text, 'm');
		}
		$text = preg_replace(array('/<([0-9]+)/'), array('< $1'), $text);
		$text = strip_tags($text, $allowed_tags);
		$text = preg_replace(array('/^\s\s+/', '/\s\s+$/', '/\s\s+/u'), array('', '', ' '), $text);
		$search = array('#<(strong|b)[^>]*>(.*?)</(strong|b)>#isu', '#<(em|i)[^>]*>(.*?)</(em|i)>#isu', '#<u[^>]*>(.*?)</u>#isu');
		$num_matches = preg_match_all("/\<!--/u", $text, $matches);
		if($num_matches){
			$text = preg_replace('/\<!--(.)*--\>/isu', '', $text);
		}
		$text = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $text);
		$text = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $text);
		$text = preg_replace('/class=".*?"/', '', $text);
		$text = preg_replace('/align=".*?"/', '', $text);
		$text = preg_replace('/style=".*?"/', '', $text);
		$text = preg_replace('#<img (.+) style="(.+)" />#isU', '<img alt="title" data-natural-width="500" $1 style="width: 545px;">', $text);
		$text = preg_replace('/ align=("|\')(.*?)("|\')/', '', $text);
		$text = preg_replace("/align='.*?'/", '', $text);
		$text = preg_replace("/'/",'"',$text);
		$domain_host = parse_url($url, PHP_URL_HOST);
		if($domain_host=="nbtv.vn"){
			$img_host = "http://". parse_url($url, PHP_URL_HOST);
			$text = preg_replace('#(href|src)="([^:"]*)("|(?:(?:%20|\s|\+)[^"]*"))#','$1="'.$img_host.'$2$3',$text);
			
		}
		
		return $text;
	}
	
    
}
?>