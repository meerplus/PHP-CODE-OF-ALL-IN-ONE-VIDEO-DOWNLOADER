<?php

		if( isset($_POST['sign']) && isset($_POST['z'])  && isset($_POST['timestamp']) )
		{

		include('Functions/functions.php');
		include('Model/ResultModel.php');
		
		$URL="https://api.zilivideo.com/puri/share/v1/detail?version_code=20190628&version_name=1.15.5.2019&server_code=100&pkg=puri_web&l=en&timestamp=". $_POST['timestamp'] . "&z=".$_POST['z']."&sign=".$_POST['sign'];

		$data=SendRequest($URL);

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$data=json_decode($data);
		$title=$data->data->title .' '. $data->data->source;
		$thumbnail=$data->data->img;

		$VideoURL=$data->data->playUrl;
		$fileSize = GetFileSize($VideoURL);

		$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,'Zili',null,$title,$fileSize);
		$result->set_VideoResults($tmp);
		echo json_encode($result);

	}

?>