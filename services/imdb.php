<?php



	function GetIMDBVideoId($url)
    {
       preg_match('/vi\d{4,20}/', $url, $match);
       if($match==null){
       	return null;
       }
       return $match[0];

    }

	function downloadIMDB($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$VideoId=GetIMDBVideoId($URL);
		  if($VideoId==null){
		  	$result->set_Status("error");		
		  	$result->set_ErrorLog("Url Not Match");
		  }
		  else
		  {
		  		$embedurl = "https://www.imdb.com/video/imdb/$VideoId/imdb/embed";
		  		$embedData=SendRequest($embedurl);
		  		$video_data = get_string_between($embedData, '<script class="imdb-player-data" type="text/imdb-video-player-json">', '</script>');
		  		$video_data = json_decode($video_data, true);

		  		$title = get_string_between($embedData, '<meta property="og:title" content="', '"/>');
		  		$thumbnail = get_string_between($embedData, '<meta property="og:image" content="', '"/>');
		  		$streams= $video_data["videoPlayerObject"]["video"]["videoInfoList"];
		  		 $i = 0;
		  		 foreach ($streams as $stream){
		  		 	if ($stream["videoMimeType"] == "video/mp4"){
		  		 		$VideoLink=$stream["videoUrl"];

		  		 		$tmp=VideoResult::GetVideoResult($VideoLink ,$thumbnail,"IMDB",null,$title);
						$result->set_VideoResults($tmp);
		  		 	}
		  		 }
		  }

		  echo json_encode($result);
	}

?>