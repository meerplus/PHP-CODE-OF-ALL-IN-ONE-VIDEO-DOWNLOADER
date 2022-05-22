<?php


function Downloadxvideos($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$title = get_string_between($data, "<title>", "</title>");
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '" />');


		$VudeoUrl=get_string_between($data, "html5player.setVideoUrlHigh('", "');");
	
		$fileSize=GetFileSize($VudeoUrl);
		$tmp=VideoResult::GetVideoResult($VudeoUrl ,$thumbnail,"xvideos",null,$title,$fileSize);
		$result->set_VideoResults($tmp);
		echo json_encode($result);	
}

?>