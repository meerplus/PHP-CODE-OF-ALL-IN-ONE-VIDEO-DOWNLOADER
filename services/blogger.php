<?php

function downloadBlogger($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$Thumbnil_link="";
		$Video_link="";
		preg_match("/<title>(.*)<\/title>/siU", $data, $title);
		preg_match_all('/src="https:\/\/www.blogger\.com\/video\.g\?token=(.*?)"/', $data, $tokens);
		
		 foreach ($tokens[1] as $iframe_token){
			 $iframe_url = "https://www.blogger.com/video.g?token=" . $iframe_token;
			 $Newdata=SendRequest($iframe_url);
			 preg_match_all('/var VIDEO_CONFIG = (.*)/', $Newdata, $video_data);
			 
			//if (!empty(($video_data[1][0]) ?? "")){
				$video_data = json_decode($video_data[1][0], true);
				 if (empty($video["thumbnail"])) {
                    $Thumbnil_link = $video_data["thumbnail"];
                }
				$Video_link=$video_data["streams"][0]["play_url"];
			//}
		 }
		$tmp=VideoResult::GetVideoResult($Video_link ,$Thumbnil_link,"Blogger",null,$title[1]);
		$result->set_VideoResults($tmp);
		
		echo json_encode($result);		
}
?>