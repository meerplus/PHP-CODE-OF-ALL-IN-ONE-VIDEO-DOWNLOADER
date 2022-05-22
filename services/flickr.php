<?php


	function downloadflickr($URL){


		$result=new ResultModel();
		$result->set_Status("Success");		

		$data=SendRequestFromChrome($URL);
		preg_match_all('/(.*?)_(.*?)_(.*?).jpg/', $data, $secret_key);
		$secret_key = $secret_key[2][0];
		$site_key = get_string_between($data, 'root.YUI_config.flickr.api.site_key = "', '";');

		//echo "$site_key=".$site_key;

		$media_id = get_string_between($data, '"photoId":"', '"');
		//echo $secret_key ."<br>";
		//echo $site_key ."<br>";
		//echo $media_id ."<br>";
		$api_url = "https://api.flickr.com/services/rest?photo_id=$media_id&secret=$secret_key&method=flickr.video.getStreamInfo&api_key=$site_key&format=json&nojsoncallback=1";

		//echo $api_url;
		
		$title = get_string_between($data, '<title>', '</title>');
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '"  data-dynamic="true">');

		if ($media_id != "" && $site_key != "" && $secret_key != ""){
			$streams = SendRequest($api_url);
			$streams = json_decode($streams, true)["streams"]["stream"];
			////echo $streams;

			$i = 0;
			foreach ($streams as $stream){
		
				$VideoLink=$stream["_content"];
				$fileSize=GetFileSize($VideoLink);
				$tmp=VideoResult::GetVideoResult($VideoLink ,$thumbnail,"flickr",null,$title,$fileSize);
				//$tmp.setQuality((string)$stream["type"]);
				$result->set_VideoResults($tmp);
				$i++;
			}
		}
	 echo json_encode($result);

	}

?>