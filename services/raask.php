<?php


	function DownloadRaask($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=get_string_between($data,'<h6>', '</h6>');
		$title=$title. ' by '. get_string_between($data,'<h4 class="titleName">', '</h4>');
		$thumbnail=get_string_between($data,' poster="', '"');

		$VideoURL=get_string_between($data,'<source src="', '" type="video/ogg" >');
		$fileSize=GetFileSize($VideoURL);
		$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		echo json_encode($result);
	}

?>