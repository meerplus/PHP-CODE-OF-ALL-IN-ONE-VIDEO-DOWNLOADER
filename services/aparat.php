<?php

	function downloadaparat($URL){
		
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);

		$JsonData=get_string_between($data,'var options = ','}}} ;');
		$JsonData=$JsonData.'}}}';
		$JsonData=json_decode($JsonData);

		foreach ($JsonData->multiSRC as $key ) {
			foreach ($key as $keySub ) {
				if($keySub->type=="video/mp4"){
					$VideoURL=$keySub->src;

					$fileSize=GetFileSize($VideoURL);
					$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
					$result->set_VideoResults($tmp);
				}
			}
		}

		echo json_encode($result);


	}


?>