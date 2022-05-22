<?php

	function Downloadrizzle($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);		

		$NextData=get_string_between($data,'<script id="__NEXT_DATA__" type="application/json">', '</script>');
		$Post=json_decode($NextData)->props->pageProps->post;
		$VideoURL=$Post->video->originalUrl;

		$fileSize=GetFileSize($VideoURL);
		$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		echo json_encode($result);


	}
?>