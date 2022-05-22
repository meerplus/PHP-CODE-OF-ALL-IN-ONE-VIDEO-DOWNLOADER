<?php


	function get_data_OKRU($video_id)
    {
      	$ch = curl_init();
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_URL, "http://ok.ru/dk?cmd=videoPlayerMetadata&mid=".$video_id);
		//curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
		//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		//curl_setopt($ch, CURLOPT_FORBID_REUSE, false);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_ENCODING, "");
		//curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
		curl_setopt($ch, CURLOPT_TIMEOUT_MS, 90000);
		$data = curl_exec($ch);
		return $data;
    }

	function downloadOKRU($URL){
		$VideoId=str_replace("video/", "", substr(parse_url($URL, PHP_URL_PATH), 1));

		echo get_data_OKRU($VideoId);
	}
?>