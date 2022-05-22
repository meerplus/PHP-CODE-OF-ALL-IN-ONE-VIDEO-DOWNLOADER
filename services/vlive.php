<?php

	function downloadvlive($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		//echo $data;

		$title = get_string_between($data, "<title>", "</title>");
		$VideoIDJson = get_string_between($data, '<script type="text/javascript">window.__PRELOADED_STATE__=', '</script>');
		$VideoIDJson=json_decode($VideoIDJson);

		//$VideoIDJson=json_decode($VideoIDJson);
		// $VideoId=$VideoIDJson["postDetail"]["post"]["officialVideo"]["vodId"]; 
		 $VideoId=$VideoIDJson -> postDetail -> post ->  officialVideo -> vodId;

		// $Keydata=SendRequest('https://www.vlive.tv/globalv-web/vam-web/video/v1.0/vod/206656/inkey?appId=8c6cc7b45d2568fb668be6e05b6e5a3b&platformType=PC&gcc=IN&locale=en_US');
		// ///$Keydata=json_decode($Keydata);
		// echo $Keydata;
		
		//echo '$VideoId='. $VideoId;

		$APIURL="https://apis.naver.com/rmcnmv/rmcnmv/vod/play/v2.0/".$VideoId."?key=V1252ec8d24e737b303575dc41d8135df6a48495f14b2c862af4b584c0ab1d98bf7d45dc41d8135df6a48&pid=rmcPlayer_16033091522023458&sid=2024&ver=2.0&devt=html5_pc&doct=json&ptc=https&sptc=https&cpt=vtt&ctls=%7B%22visible%22%3A%7B%22fullscreen%22%3Atrue%2C%22logo%22%3Afalse%2C%22playbackRate%22%3Afalse%2C%22scrap%22%3Afalse%2C%22playCount%22%3Atrue%2C%22commentCount%22%3Atrue%2C%22title%22%3Atrue%2C%22writer%22%3Atrue%2C%22expand%22%3Atrue%2C%22subtitles%22%3Atrue%2C%22thumbnails%22%3Atrue%2C%22quality%22%3Atrue%2C%22setting%22%3Atrue%2C%22script%22%3Afalse%2C%22logoDimmed%22%3Atrue%2C%22badge%22%3Atrue%2C%22seekingTime%22%3Atrue%2C%22muted%22%3Atrue%2C%22muteButton%22%3Afalse%2C%22viewerNotice%22%3Afalse%2C%22linkCount%22%3Afalse%2C%22createTime%22%3Afalse%2C%22thumbnail%22%3Atrue%7D%2C%22clicked%22%3A%7B%22expand%22%3Afalse%2C%22subtitles%22%3Afalse%7D%7D&pv=4.18.40&dr=1366x768&cpl=en_US&lc=en_US&adi=%5B%7B%22adSystem%22%3A%22TPA%22%7D%5D&adu=dummy&videoId=".$VideoId."&cc=IN";

		$APIdata=SendRequest($APIURL);

		//echo $APIdata;

		$APIdata=json_decode($APIdata);

		
		$thumbnail=$APIdata->thumbnails->list[1]->source;
		//echo $thumbnil->source;
	
		foreach ($APIdata->videos->list as $key ) {
					$fileSize=GetFileSize($key->source);
					$tmp=VideoResult::GetVideoResult($key->source ,$thumbnail,"vlive.tv",null,$title,$fileSize);
					$result->set_VideoResults($tmp);	
				}		

		echo json_encode($result);

		

		

	}

?>