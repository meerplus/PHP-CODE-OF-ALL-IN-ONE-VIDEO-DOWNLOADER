<?php


	function downloaddailymotion($URL){
		$result=new ResultModel();
		$result->set_Status("Success");	
		$result->set_InternalDownload(true);	

		$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );
		
		$embedUrl="https://www.dailymotion.com/embed/video/". $VideoId;
		$data=SendRequest($embedUrl);
		preg_match_all('/window.__PLAYER_CONFIG__ =(.*);/', $data, $match);
		if (isset($match[1][0]) != ""){
			$jsonData=json_decode($match[1][0], true);
			$Thumbnil_link=$jsonData["metadata"]["posters"][max(array_keys($jsonData["metadata"]["posters"]))];
			$title=$jsonData["metadata"]["title"];
			$Video_link=$jsonData["metadata"]["qualities"]["auto"][0]["url"];


			$m3u8data=SendRequest($Video_link);
			preg_match_all('/#EXT-X-STREAM-INF:(.*)/', $m3u8data, $streams_raw);

			$streams_raw = $streams_raw[1];
			$streams = array();
			foreach ($streams_raw as $stream) {
                $quality = get_string_between($stream, 'NAME="', '"');
                if (!isset($streams[$quality])) {
                    $streams[$quality]["quality"] = $quality;
                    $streams[$quality]["url"] = get_string_between($stream, 'PROGRESSIVE-URI="', '"');
                }
            }
            $i = 0;
            foreach ($streams as $stream){
                $video["links"][$i]["url"] = $stream["url"];
                $video["links"][$i]["type"] = "mp4";
                $video["links"][$i]["quality"] = $stream["quality"] . "p";
                $video["links"][$i]["mute"] = "no";

            	$VideoLink=$stream["url"];
            	$fileSize=GetFileSize($VideoLink);
            	//$DownloadedLink =DownloadFile($VideoLink);

            	$tmp=VideoResult::GetVideoResult($VideoLink ,$Thumbnil_link,"dailymotion",null,$title,$fileSize);
				$result->set_VideoResults($tmp);


                $i++;
            }
		}
		//echo $video["links"][0]["url"] ;
		//echo "<br><br>";
		echo json_encode($result);

		// echo $result->VideoResult[0]->VideoUrl;
		// $data=SendRequest($result->VideoResult[0]->VideoUrl);
		// echo $data;


		//echo $tmp;



		

	}

?>