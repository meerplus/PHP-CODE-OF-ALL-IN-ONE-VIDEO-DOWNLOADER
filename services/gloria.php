<?php

	function downloadgloria($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);

		$VideoUrl=get_string_between($data,'<source type="video/mp4; codecs=&quot;avc1.42C01E,mp4a.40.5&quot;" src="','"');

		$fileSize=GetFileSize($VideoUrl);
		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,get_domain($URL),null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		echo json_encode($result);
	}
?>