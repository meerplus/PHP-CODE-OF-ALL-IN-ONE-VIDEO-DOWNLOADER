<?php

	function DownloadHind($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$Nextdata=get_string_between($data,'window.__STATE__ =', ';');
		$Nextdata=json_decode($Nextdata);
		$thumbnail=$Nextdata->feed->feed[0]->data->thumbnail_url;
		$title="Video by @". $Nextdata->feed->feed[0]->data->uploaded_by_name;

		$VideoURL=$Nextdata->feed->feed[0]->download_media;

		$fileSize=GetFileSize($VideoURL);
		$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		echo json_encode($result);
	}

?>