<?php

	function downloadsolidfiles($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		//echo $data;

		$title = get_string_between($data, "<title>", "</title>");
		
		$JSONData=get_string_between($data, "constant('viewerOptions',", ");</script>");
		$JSONData=json_decode($JSONData);
		$VideoUrl=$JSONData->downloadUrl;
		$thumbnail=$JSONData->splashUrl;

		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,"SendVid",null,$title);
		$result->set_VideoResults($tmp);

		//echo json_encode($result);

		// echo $VideoUrl;
	}

?>