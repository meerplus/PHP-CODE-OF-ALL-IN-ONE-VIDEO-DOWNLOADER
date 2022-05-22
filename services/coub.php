<?php

function Downloadcoub($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);

		$jsonString = get_string_between($data, "<script id='coubPageCoubJson' type='text/json'>", "</script>");

		$jsonString=json_decode($jsonString);

		$VideoUrl=$jsonString->file_versions->share->default;

		$fileSize=GetFileSize($VideoUrl);

		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,"coub",null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		echo json_encode($result);
}

?>