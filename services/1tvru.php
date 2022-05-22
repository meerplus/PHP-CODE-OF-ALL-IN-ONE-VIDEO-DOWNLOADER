<?php

	function download1tvru($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);


		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);

		$VideoIdString=get_string_between($data,'<meta property="og:video:secure_url" content="','"');
		$VideoId= (explode("/",$VideoIdString)[ count(explode("/",$VideoIdString))-1 ] );

		if( strpos($VideoId, ':') ){
			$VideoId= explode(":",$VideoId)[ 0];			
		}

		$APIURL="https://www.1tv.ru/playlist?admin=false&single=false&sort=none&video_id=".$VideoId;
		$APIdata=SendRequest($APIURL);
		$APIdata=json_decode($APIdata);

		$FirstObject=$APIdata[0];

		$i=0;
		foreach ($FirstObject->mbr as $key => $value) {
			$VideoURL=	"https://".$FirstObject->mbr[$i]->src;

			$fileSize=GetFileSize($VideoURL);
			$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
			$result->set_VideoResults($tmp);

			$i=$i+0;
		}

		echo json_encode($result);
	}

?>