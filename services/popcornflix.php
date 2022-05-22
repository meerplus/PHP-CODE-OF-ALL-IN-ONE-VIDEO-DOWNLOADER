<?php

	function downloadpopcornflix($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		
		
		$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );

		$data=SendRequest("https://api.unreel.me/v1/video/uid/".$VideoId."/info?__site=popcornflix&__source=web");
		$data=json_decode($data);

		$title = $data->title;
		$thumbnail = $data->metadata->thumbnails->maxres;


		
		$dataVeoh = SendRequest("https://api.unreel.me/v2/sites/popcornflix/videos/".$VideoId."/play-url?__site=popcornflix&__source=web&embed=false&protocol=https&tv=false");
		$VideoURL= json_decode($dataVeoh)->url ;

		$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,"popcornflix",null,$title);
		$result->set_VideoResults($tmp);

		echo json_encode($result);
	}


?>