<?php


	
	function downloadespn($URL){
		//GetVideoId($URL);


		$result=new ResultModel();
		$result->set_Status("Success");		
		
		$data=SendRequest($URL);
		$VideoIds=get_string_between($data, 'data-cerebro-id="', '"');

		//$VideoIds=GetVideoId($URL);
		//echo $VideoIds;

		//foreach ($VideoIds as $key => $VideoId) {
			//echo $VideoId;
			//$api = "http://cdn.espn.com/core/video/clip/_/id/" . $VideoId . "?xhr=1&device=desktop&country=us&lang=en&region=us&site=espn&edition-host=espn.com&one-site=true&site-type=full";

			$api="https://watch.auth.api.espn.com/video/auth/getclip/".$VideoIds."?apikey=uiqlbgzdwuru14v627vdusswb";
			$APiResult = json_decode(SendRequest($api),true);
			$title= $APiResult["clip"]["headline"];
			$Thumbnil_link = get_string_between($data, '<meta property="og:image" content="', '"/>');
			$Video_link = $APiResult["clip"]["transcodes"]["brightcove"];
			$tmp=VideoResult::GetVideoResult($Video_link ,$Thumbnil_link,"espn",null,$title);
			$result->set_VideoResults($tmp);
		//}
		echo json_encode($result);
	}

?>