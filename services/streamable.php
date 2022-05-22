<?php

function downloadstreamable($URL){

	$result=new ResultModel();
	$result->set_Status("Success");		
	$data=SendRequestBase($URL,false,null,3);

	$title=GetTitle($data);
	$thumbnail=GetThumbnil($data);
	$VideoURL=get_string_between($data,'<meta property="og:video" content="','"');

	$fileSize=GetFileSize($VideoURL);
	$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,"streamable",null,$title,$fileSize);
	$result->set_VideoResults($tmp);

	echo json_encode($result);
}
	
?>