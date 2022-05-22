<?php

function DownloadJosh($URL){

	$result=new ResultModel();
	$result->set_Status("Success");		
	$data=SendRequest($URL);

	$NEXTDATA=get_string_between($data,'<script id="__NEXT_DATA__" type="application/json">', '</script>');
	$NEXTDATA=json_decode($NEXTDATA);

	$title=$NEXTDATA->props->pageProps->detail->data->content_title;
	$thumbnail=$NEXTDATA->props->pageProps->detail->data->thumbnail_url;
	$VideoURL=$NEXTDATA->props->pageProps->detail->data->mp4_url;

	$fileSize=GetFileSize($VideoURL);
	$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,get_domain($URL),null,$title,$fileSize);
	$result->set_VideoResults($tmp);

	echo json_encode($result);

	
}

?>