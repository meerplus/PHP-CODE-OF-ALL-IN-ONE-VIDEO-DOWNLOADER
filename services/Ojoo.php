<?php
	

	if( isset($_POST['title']) && isset($_POST['thumbnil'])  && isset($_POST['VideoUrl']) )
	{
		include('Functions/functions.php');
		include('Model/ResultModel.php');

		$result=new ResultModel();
		$result->set_Status("Success");		

		$title=$_POST['title'];
		$thumbnail=$_POST['thumbnil'];
		$VideoURL=$_POST['VideoUrl'];

		$fileSize = GetFileSize($VideoURL);

		$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,'Ojoo',null,$title,$fileSize);
		$result->set_VideoResults($tmp);
		echo json_encode($result);


	}

	function DownloadOjoo($URL){



		$data=SendRequest($URL);

		$ReqScript=get_string_between($data,'<script>window.__NUXT__=', ';</script>');
		$ReqScript="{data:'var Ab=".$ReqScript."'}";

		echo $ReqScript;
	}

?>