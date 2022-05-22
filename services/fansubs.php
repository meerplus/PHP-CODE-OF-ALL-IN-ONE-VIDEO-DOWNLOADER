<?php

	function downloadfansubs($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		// echo $data;

		$title = get_string_between($data, "<title>", "</title>");
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '"');

		$VideoUrl = get_string_between($data, '<source src="', '"');

		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,"SendVid",null,$title);
		$result->set_VideoResults($tmp);

		echo json_encode($result);
	}

?>