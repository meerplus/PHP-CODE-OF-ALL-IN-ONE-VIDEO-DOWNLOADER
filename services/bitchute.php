<?php

	function downloadbitchute($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$title = get_string_between($data, "<title>", "</title>");
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '" />');

		$PageId=(explode("/",$thumbnail)[5] );
		$VideoId=(explode("/",$URL)[4] );


		$VudeoUrl=get_string_between($data, '<source src="', '" type="video/mp4" />');
	

		$tmp=VideoResult::GetVideoResult($VudeoUrl ,$thumbnail,"bitchute",null,"bitchute");
		$result->set_VideoResults($tmp);
		echo json_encode($result);	

	}

?>