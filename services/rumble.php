<?php

	function Downloadrumble($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$title = get_string_between($data, "<title>", "</title>");
		// $thumbnail = get_string_between($data, '<meta property="og:image" content="', '" />');

		$VideoID=get_string_between($data, 'video":"', '"');

		//echo $VideoID;

		$APIURL='https://rumble.com/embedJS/u3/?request=video&v='. $VideoID .'&ext=%7B%22ad_count%22%3Anull%7D';

		$APIdata=SendRequest($APIURL);
		$APIdata=json_decode($APIdata);

		$thumbnail=$APIdata->i;		
		$VudeoUrl=$APIdata->u;
		$title=$APIdata->title;

		$fileSize=GetFileSize($VudeoUrl);
		$tmp=VideoResult::GetVideoResult($VudeoUrl ,$thumbnail,"Rumble",null,$title,$fileSize);
		$result->set_VideoResults($tmp);
		echo json_encode($result);	
		//echo $APIdata;

	}

?>