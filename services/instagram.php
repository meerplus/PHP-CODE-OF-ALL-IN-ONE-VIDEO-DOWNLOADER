<?php


function downloadInstagram($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$Video_link = get_string_between($data, 'property="og:video" content="', '"');
		$Thumbnil_link = get_string_between($data, 'property="og:image" content="', '"');
		$title= get_string_between($data, 'property="og:title" content="', '"');
		$tmp=VideoResult::GetVideoResult($Video_link ,$Thumbnil_link,"Instagram",null,$title);
		$result->set_VideoResults($tmp);
		
		echo json_encode($result);		
}

?>