<?php

	function downloadaudiomack($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		

		$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );


		$APIURL="";

		if( strpos($URL,'album') ) {

			$AlbumName= (explode("/",$URL)[ count(explode("/",$URL))-3 ] );

			$APIURL="https://api.audiomack.com/v1/music/album/". $AlbumName ."/".$VideoId."?oauth_consumer_key=audiomack-js&oauth_nonce=S7xFXTxNoPZ4mRBTReaJavYGRXjk0Zh8&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1603377607&oauth_version=1.0&oauth_signature=zo%2FB3X70upsTvbvcXWI%2FyL02zJI%3D";

			echo $APIURL;
		}

		

		$data=SendRequest($APIURL);
		$data=json_decode($data);



		$data=$data->results;

		
		$thumbnail=$data->image;

		$i=0;
		foreach ($data->tracks as $track) {

			$Audio=$track->streaming_url;
			$fileSize=GetFileSize($Audio);

			$title=$track->title;

			$tmp=VideoResult::GetVideoResult(null ,$thumbnail,get_domain($URL),$Audio,$title,$fileSize);
			$result->set_VideoResults($tmp);
		}



		echo json_encode($result);

	}

?>