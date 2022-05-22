<?php

function DownloadTED($URL){

	$result=new ResultModel();
		$result->set_Status("Success");		
		$result->set_InternalDownload(true); 
		$data=SendRequest($URL);

		preg_match_all('/"__INITIAL_DATA__":(.*?)}\)/', $data, $match);
		$json = json_decode($match[1][0], true);

		$title =$json["name"];
		$thumbnail =$json["talks"][0]["hero"];

		foreach ($json["talks"][0]["downloads"]["nativeDownloads"] as $quality => $url){

			$VudeoURL=$url;
			$fileSize=GetFileSize($VudeoURL);
			$tmp=VideoResult::GetVideoResult($VudeoURL ,$thumbnail,"4shared",null,$title,$fileSize);
			$result->set_VideoResults($tmp);

		}
		echo json_encode($result);	

		//echo $title;
}

?>