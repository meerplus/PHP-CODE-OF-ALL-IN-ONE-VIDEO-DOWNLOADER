<?php

function downloadallocine($URL){

	$result=new ResultModel();
	$result->set_Status("Success");		
	$data=SendRequest($URL);

	$title=GetTitle($data);
	$thumbnail=GetThumbnil($data);

	$VideoURL=get_string_between($data,'href="//fr.vid', '.mp4');
	$VideoURL='//fr.vid'.$VideoURL.'.mp4';

	$fileSize=GetFileSize($VideoURL);
	$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
	$result->set_VideoResults($tmp);

	echo json_encode($result);
	

}

?>