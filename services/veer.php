<?php

function downloadVeer($URL){

	$result=new ResultModel();
	$result->set_Status("Success");		
	$data=SendRequest($URL);
	$title=GetTitle($data);
	$thumbnail=get_string_between($data,'<video controls  poster="','"');
	$VideoURL=get_string_between($data,'<source src="','"');

	$fileSize=GetFileSize($VideoURL);
	$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,"Veer",null,$title,$fileSize);
	$result->set_VideoResults($tmp);

	echo json_encode($result);
	//echo $data; 

}

?>