<?php

function  downloadfacebook($URL)
{
		if (strpos($URL, 'videos') !== false) {
		   $URL=str_replace('videos', 'posts', $URL);
		}


		$result=new ResultModel();
		$result->set_Status("Success");		
		$result->set_InternalDownload(false);
		$data=SendRequestFB($URL);
		//echo $data;
		$Video_link = get_string_between($data, 'property="og:video" content="', '"');

		$Video_link=str_replace("&amp;","&",$Video_link);

		$Thumbnil_link = GetThumbnil($data);
		$title = GetTitle($data);;
		$fileSize=GetFileSize($Video_link);
		$tmp=VideoResult::GetVideoResult($Video_link ,$Thumbnil_link,"Facebook",null,$title,$fileSize);
		$result->set_VideoResults($tmp);
		
		 echo json_encode($result);		
}


function SendRequestFB($URL,$encode=false)
{
		$useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		  curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        //curl_setopt($ch, CURLOPT_SSLVERSION, 4);
        //curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
		curl_setopt($ch, CURLOPT_FORBID_REUSE, false);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
		curl_setopt($ch, CURLOPT_TIMEOUT_MS, 90000);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "authority: www.facebook.com",
            "cache-control: max-age=0",
            "upgrade-insecure-requests: 1",
            "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
            "sec-fetch-site: none",
            "sec-fetch-mode: navigate",
            "sec-fetch-user: ?1",
            "sec-fetch-dest: document"
        ));
		if($encode==true){
				curl_setopt($ch, CURLOPT_ENCODING , "gzip");
		}
		$data = curl_exec($ch);
		if (curl_errno($ch)) {
			    return curl_error($ch);
		}
		curl_close($ch);
		return $data;
}
?>