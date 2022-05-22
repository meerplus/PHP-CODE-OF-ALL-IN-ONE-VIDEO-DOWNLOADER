<?php


	
	function ImgurMethod2($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );

		$VideoURL="https://i.imgur.com/".$VideoId.".mp4";
		$thumbnil="https://i.imgur.com/".$VideoId.".png";

		$tmp=VideoResult::GetVideoResult($VideoURL,$thumbnil,"imgur",null,null);
		$result->set_VideoResults($tmp);

		echo json_encode($result);
	}

	function ImgurMethod1($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );
		$API="https://api.imgur.com/post/v1/posts/".$VideoId."?client_id=546c25a59c58ad7&include=media%2Ctags%2Caccount%2Cadconfig%2Cpromoted";
		$data=SendRequest($API,true);
		$APIData=json_decode($data);
		$title=$APIData->title;
		$i=0;
		foreach ($APIData->media as $media) {
					$VideoUrl=$media->url;
					$Thumbnil= str_replace("mp4","png", $VideoUrl);
					$tmp=VideoResult::GetVideoResult($VideoUrl,$Thumbnil,"imgur",null,$title);
					$result->set_VideoResults($tmp);
				}		

		echo json_encode($result);
	}

	function downloadimgur($URL){
		if( strpos($URL,"gallery") ){
			ImgurMethod1($URL);
		}
		else{
			ImgurMethod2($URL);
		}
	}

	

?>