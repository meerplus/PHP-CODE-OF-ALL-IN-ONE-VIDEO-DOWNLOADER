<?php

function  download9gag($URL)
{
		$result=new ResultModel();
		$result->set_Status("Success");		
		$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );
		$Video_link = "https://img-9gag-fun.9cache.com/photo/" . $VideoId . "_460sv.mp4";
		$Thumbnil_link = "http://images-cdn.9gag.com/photo/" . $VideoId . "_460s.jpg";
		$tmp=VideoResult::GetVideoResult($Video_link ,$Thumbnil_link,"9GAG");
		$result->set_VideoResults($tmp);
		echo json_encode($result);	
}

?>