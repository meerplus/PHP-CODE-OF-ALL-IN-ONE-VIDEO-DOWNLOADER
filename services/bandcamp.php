<?php

	function downloadBandcamp($URL){
		$result=new ResultModel();
		$result->set_Status("Success");	
		$data=SendRequest($URL);
		if (preg_match_all('@content="https://bandcamp.com/EmbeddedPlayer/(.*?)">@si', $data, $match)){
			
			$embed_url = "https://bandcamp.com/EmbeddedPlayer/" . $match[1][0];
			//echo $embed_url ;
			$embed_page=SendRequestFromChrome($embed_url);

			// preg_match_all('@var playerdata = (.*?);@', $embed_page, $match1);
			// echo json_encode($match1);


			if (preg_match_all('@var playerdata = (.*?);@', $embed_page, $match)){		

				//echo $match[1][0];

				$player_json = $match[1][0];
				//echo $player_json;
				$player_data = json_decode($player_json, true);

				//echo json_encode($match[1][0]);

				$i = 0;
				if (!empty($player_data["tracks"])) {
					foreach ($player_data["tracks"] as $key => $p_data){
						if (!empty($p_data["file"]["mp3-128"])){
							// $Thumbnil_link=$p_data["art"];
							$Thumbnil_link="";
							 $AudioLink=$p_data["file"]["mp3-128"];
							 $title=$p_data["title"];
							 $tmp=VideoResult::GetVideoResult(null ,$Thumbnil_link,"bandcamp",$AudioLink,$title);
							 $result->set_VideoResults($tmp);
						}
					}
				}
			}
			echo json_encode($result);		
		}
	}
?>