<?php

	function downloadmeme($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title = get_string_between($data, "<title>", "</title>");
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '"');
		$VideoUrl = get_string_between($data, '<meta property="og:video" content="', '"');

		
		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,"me.me",null,$title);
		$result->set_VideoResults($tmp);

		echo json_encode($result);

	}

?>