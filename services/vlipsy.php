<?php


	function downloadvlipsy($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		

		$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );

		$APIUrl="https://apiv2.vlipsy.com/v1/vlips/".$VideoId."?key=vl_R8daJGhs67i7Ej7y";
		$APIdata=SendRequest($APIUrl);

		$APIdata=json_decode($APIdata);
		
		$title = $APIdata->data->title;
		$thumbnail =$APIdata->data->media->preview_small->url;
		
		$VideoUrl =$APIdata->data->media->mp4->url;
		
		$fileSize=GetFileSize($VideoUrl);
		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,"vlipsy",null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		echo json_encode($result);

	}

?>