<?php

function Downloadkwai($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$title = get_string_between($data, "<title>", "</title>");
		$video_url = get_string_between($data, '<video src="', '"');
		$thumbnail = get_string_between($data, 'poster="', '"');
		$fileSize=GetFileSize($VudeoURL);
		$tmp=VideoResult::GetVideoResult($VudeoURL ,$thumbnail,"4shared",null,$title,$fileSize);
		$result->set_VideoResults($tmp);
		echo json_encode($result);	


}

?>