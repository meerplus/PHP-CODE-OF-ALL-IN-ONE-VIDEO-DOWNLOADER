<?php

	function downloadwwe($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);

		$VideoUrl=get_string_between($data,'<meta name="twitter:player:stream" content="','"');

		$fileSize=GetFileSize($VideoUrl);
		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,get_domain($URL),null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		echo json_encode($result);

		//echo $data;


	}

?>