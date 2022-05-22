<?php


	function downloadsendvid($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		
		$data=SendRequest($URL);

		$title = get_string_between($data, "<title>", "</title>");
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '"');

		$VideoUrl = get_string_between($data, '<source src="', '"');
		
		$NewURL=DownloadFile($VideoUrl);

		$tmp=VideoResult::GetVideoResult($NewURL ,$thumbnail,"SendVid",null,$title);
		$result->set_VideoResults($tmp);

		echo json_encode($result);

	}
?>