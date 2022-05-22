<?php


function downloadbilibili($URL){
	
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL,true);
		
		preg_match_all('@window.__playinfo__=(.*?)</script>@', $data, $matches);
		 if (isset($matches[1][0]) != "") {
            $dataVal = json_decode($matches[1][0], true)["data"]["dash"];
			$Thumbnil_link = get_string_between($data, 'itemprop="thumbnailUrl" content="', '"');
			$title = get_string_between($data, 'property="og:title" content="', '"');
			if( count($dataVal["audio"]) >0 ){
				$AudioLink=$dataVal["audio"][0]["baseUrl"];
			}
			if( count($dataVal["video"]) >0 ){
				$VideoLink=$dataVal["video"][0]["baseUrl"];
			}
			$tmp=VideoResult::GetVideoResult($VideoLink ,$Thumbnil_link,"bilibili",$AudioLink,$title);
			$result->set_VideoResults($tmp);
			
        } else {
            $result->set_Status("error");		
        }
		echo json_encode($result);

	
}

?>