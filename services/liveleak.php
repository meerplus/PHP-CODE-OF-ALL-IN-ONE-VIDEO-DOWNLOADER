<?php

	function downloadliveleak($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);


		$thumbnail=null;
		$title=null;
		if (preg_match_all('<meta property="og:image" content="(.*?)"/>', $data, $match)) {
            $thumbnail = $match[1][0];
        }
        if (preg_match_all('<meta property="og:description" content="(.*?)"/>', $data, $match)) {
            $title = $match[1][0];
        }

         if (preg_match_all('/src="(.*?)" (default|) label="(720p|360p|HD|SD)"/', $data, $matches)){

         	$i = 0;
         	foreach ($matches[1] as $match){

         		$VideoUrl=$match;

         		$tmp=VideoResult::GetVideoResult($VideoUrl,$thumbnail,"liveleak",null,$title);
				$result->set_VideoResults($tmp);
         	}

         }

         echo json_encode($result);
	}
?>