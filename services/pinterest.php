<?php


	function downloadpinterest($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$video_data = get_string_between($data, '<script id="initial-state" type="application/json">', '</script>');
		
		$title = get_string_between($data, "<title>", "</title>");

		$streams = json_decode($video_data, true)["resourceResponses"][0]["response"]["data"]["videos"]["video_list"];
		//echo json_encode($streams);
		if ($streams != ""){
			$i = 0;
			foreach ($streams as $stream) {
				$ext = pathinfo(parse_url($stream["url"])["path"], PATHINFO_EXTENSION);
				if ($ext != "m3u8"){
					
		  			$thumbnail =$stream["thumbnail"];
		  			$VideoLink=$stream["url"];

		  			$tmp=VideoResult::GetVideoResult($VideoLink ,$thumbnail,"pinterest",null,$title);
					$result->set_VideoResults($tmp);
				}
			}
		}
		echo json_encode($result);

	}

?>