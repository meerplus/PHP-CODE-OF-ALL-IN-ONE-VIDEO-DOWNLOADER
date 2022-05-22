<?php


function Downloadmitron($URL){
	$result=new ResultModel();
	$result->set_Status("Success");	


	$VideoId= (explode("=",$URL)[ count(explode("=",$URL))-1 ] );

	$data=SendRequestFromChrome('https://web.mitron.tv/video/'.$VideoId);

	
	$_NextData=get_string_between($data,'<script id="__NEXT_DATA__" type="application/json">', '</script>');

	echo $data;
	// $_VideoObject=json_decode($_NextData)->props->pageProps->video;
	// $_UserObject=json_decode($_NextData)->props->pageProps->user;

	// $title="Video By " . $_UserObject->firstName .' '. $_UserObject->lastName;
	// $thumbnail=$_VideoObject->thumbUrl;
	// $VideoURL=$_VideoObject->videoUrl;


	// $fileSize=GetFileSize($VideoURL);
	// $tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
	// $result->set_VideoResults($tmp);

	// echo json_encode($result);

}

?>