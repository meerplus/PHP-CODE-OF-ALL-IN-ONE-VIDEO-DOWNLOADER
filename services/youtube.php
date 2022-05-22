<?php

	require_once __DIR__ . "/vendor/autoload.php";
	use YouTube\YouTubeDownloader;

function downloadyoutube($URL){
	
	$result=new ResultModel();
	$result->set_Status("Success");		
	$data=SendRequest($URL);
	$title = get_string_between($data, "<title>", "</title>");

	$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );

	$thumbnail = "https://img.youtube.com/vi/".$VideoId."/0.jpg";

	$yt = new YouTubeDownloader();
	$data = $yt->getDownloadLinks($URL);
	$links = $data;
	//$json = $data["json"];
	//$title = $json["videoDetails"]["title"];
	//$thumbnail = "https://i.ytimg.com/vi/" . $json["videoDetails"]["videoId"] . "/mqdefault.jpg";
	$video["links"] = array();

	foreach ($links as $link){
		$VideoURL=$link["url"];
		$fileSize = GetFileSize($link["url"]);
		$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
		$result->set_VideoResults($tmp);

	}

	echo json_encode($result);

}	

?>