<?php


	function Downloadboloindya($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);		

		$VideoURL='https:'. get_string_between($data,'var videoFileCDN="https:', '";');

		$fileSize=GetFileSize($VideoURL);
		$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		echo json_encode($result);
	}

?>