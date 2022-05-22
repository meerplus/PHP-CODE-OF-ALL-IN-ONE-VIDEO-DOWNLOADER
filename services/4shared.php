<?php


	function Download4shared($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$result->set_InternalDownload(true); 
		$data=SendRequest($URL);
		$title = get_string_between($data, "<title>", "</title>");
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '" />');

		$VudeoURL= get_string_between($data, "file: '", "',");

		$fileSize=GetFileSize($VudeoURL);
		$tmp=VideoResult::GetVideoResult($VudeoURL ,$thumbnail,"4shared",null,$title,$fileSize);
		$result->set_VideoResults($tmp);
		echo json_encode($result);	
	}

?>