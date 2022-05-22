<?php


	function downloadkickstarter($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title = get_string_between($data, "<title>", "</title>");
		$VideoJson = get_string_between($data, '<div class="bg-grey-100" data-initial="', '"');
		$VideoJson=str_replace("&quot;", '"', $VideoJson);
		$VideoJson=json_decode($VideoJson);


		$VideoObject=$VideoJson->project->video;
		$thumbnail=$VideoObject->previewImageUrl;

		$i=0;
		foreach ($VideoObject->videoSources as $key ) {
			
			if(! strpos($key->src, 'm3u8'))
			{

				$fileSize=GetFileSize($key->src);

				$tmp=VideoResult::GetVideoResult($key->src ,$thumbnail,"kickstarter",null,$title,$fileSize);
				$result->set_VideoResults($tmp);	
			}
		}

		echo json_encode($result);
	}

?>