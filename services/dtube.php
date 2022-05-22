<?php


	function downloaddtube($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		

		$profileId=(explode("/",$URL)[ count(explode("/",$URL))-2 ] );
		$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );

		$infoUrl="https://avalon.d.tube/content/".$profileId."/".$VideoId;
		// echo $infoUrl;

		$VideoInfo=SendRequest($infoUrl);

		echo $VideoInfo;

		$VideoInfo=json_decode($VideoInfo);

		$title = $VideoInfo->json->title;


		foreach ($VideoInfo->json->files->ipfs->img as $key => $value) {
				//$keey=  $VideoInfo->json->files->ipfs->img[$key];
				$thumbnail="https://snap1.d.tube/ipfs/".$value;
		}

		//$thumbnail="https://snap1.d.tube/ipfs/". $VideoInfo->json->files->ipfs->img->360;
		$VideoURL="https://player.d.tube/btfs/".$VideoId;

		$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,"d.tube",null,$title);
		$result->set_VideoResults($tmp);

		//echo json_encode($result);

	
	}
?>