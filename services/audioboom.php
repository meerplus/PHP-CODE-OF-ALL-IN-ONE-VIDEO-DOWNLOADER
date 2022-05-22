<?php



function downloadaudioboom($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$AudioUrl=get_string_between($data,'data-new-clip-store="', '"');
		$AudioUrl=str_replace("&quot;",'"', $AudioUrl);
		$AudioUrl=json_decode($AudioUrl);
		$Audio= $AudioUrl->clips[0]->clipURLPriorToLoading;
		$ImageId=$AudioUrl->clips[0]->image->id;
		$thumbnail='https://images.theabcdn.com/i/'.$ImageId;
		$title=$AudioUrl->clips[0]->title;
		$fileSize=GetFileSize($Audio);
		$tmp=VideoResult::GetVideoResult(null ,$thumbnail,get_domain($URL),$Audio,$title,$fileSize);
		$result->set_VideoResults($tmp);
		echo json_encode($result);
}

?>