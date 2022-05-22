

<?php


	function file_get_contents_curl($url)
	{
		$id_code=explode('/',$url)[  count(explode('/',$url)) -1  ];
		$APIUrl="https://onelink.appsflyer.com/shortlink-sdk/v1/vQZT?id=" . $id_code;

		
		$headers = [
			'authorization: b6cf083b1aa0b70f4b473b1e798745abf7f8fb5b',
			'content-type: application/json',
			'af-timestamp: 1600586160',
			'Accept-Encoding: gzip',
			'User-Agent: Dalvik/2.1.0 (Linux; U; Android 5.1.1; SM-J200G Build/LMY47X)',
			'Connection: Keep-Alive'
		];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $APIUrl);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
		$data = curl_exec($ch);
		curl_close($ch);

		//echo $data;
		return $data;
	}


	function DownloadMXTAKATAK($url)
	{


	
	
	$UCode=json_decode(file_get_contents_curl($url),true)["u_code"];
	
	
	if(strlen($UCode) > 20)
	{
		$DownloadableURL="https://qqtakatak.mxplay.com/video/". $UCode ."/download/1/h265_main_450.mp4";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
		curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
		$_responce = curl_exec($ch);
		curl_close($ch);
		if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
		{
			$DownloadableURL="https://mxshorts.akamaized.net/video/". $UCode ."/download/1/h265.mp4";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
			curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
			curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
			$_responce = curl_exec($ch);
			curl_close($ch);
			
			if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
			{
				$DownloadableURL="https://qqtakatak.mxplay.com/video/". $UCode."/download/1/h265.mp4";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
				curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
				curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
				$_responce = curl_exec($ch);
				curl_close($ch);
				
				if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
				{
					$DownloadableURL="https://mxshorts.akamaized.net/video/".  $UCode ."/download/1/h264_high_480.mp4";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
					curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
					curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
					$_responce = curl_exec($ch);
					curl_close($ch);
					
					if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
					{
						$DownloadableURL="https://mxshorts.akamaized.net/video/". $UCode ."/download/1/h265_main_480.mp4";
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
						curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
						curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
						$_responce = curl_exec($ch);
						curl_close($ch);
						
						if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
						{
							$DownloadableURL="https://mxshorts.akamaized.net/video/". $UCode ."/download/1/h265_main_360.mp4";
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
							curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
							curl_setopt($ch, CURLOPT_HEADER, 0);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
							curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
							$_responce = curl_exec($ch);
							curl_close($ch);
							
							if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
							{
								
							}
							else
							{
								CreateFile($DownloadableURL,$_responce);
							}
						}
						else
						{
							CreateFile($DownloadableURL,$_responce);
						}
					}
					else
					{
						CreateFile($DownloadableURL,$_responce);
					}
				}
				else
				{
					CreateFile($DownloadableURL,$_responce);
				}
			}
			else
			{
				CreateFile($DownloadableURL,$_responce);
			}
		
		}
		else{
			 CreateFile($DownloadableURL,$_responce);
		}
	}
	else
	{
		$DownloadableURL="https://mxshorts.akamaized.net/video/".$UCode."/download/1/h265.mp4";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
		curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
		$_responce = curl_exec($ch);
		curl_close($ch);
		if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
		{
			$DownloadableURL="https://mxshorts.akamaized.net/video/" . $UCode . "/download/1/h265_main_270.mp4";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
			curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
			curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
			$_responce = curl_exec($ch);
			curl_close($ch);
			if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
			{
				$DownloadableURL="https://takatak.s.llnwi.net/short-video/video/" . $UCode  ."/download/2/h265_main_540.mp4";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
				curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
				curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
				$_responce = curl_exec($ch);
				curl_close($ch);
				if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
				{
					$DownloadableURL="https://mxshorts.akamaized.net/video/". $UCode  ."/download/1/h265_main_540.mp4";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
					curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
					curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
					$_responce = curl_exec($ch);
					curl_close($ch);
					if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
					{
						$DownloadableURL="https://mxshorts.akamaized.net/uploadv1/prod/5069/". $UCode  .".mp4";
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
						curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
						curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
						$_responce = curl_exec($ch);
						curl_close($ch);
						if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
						{
							$DownloadableURL="https://mxshorts.akamaized.net/video/". $UCode  ."/download/1/h265_main_488.mp4";
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
							curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
							curl_setopt($ch, CURLOPT_HEADER, 0);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
							curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
							$_responce = curl_exec($ch);
							curl_close($ch);
							if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
							{
								$DownloadableURL="https://mxshorts.akamaized.net/video/". $UCode  ."/download/1/h265_main_360.mp4";
								$ch = curl_init();
								curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
								curl_setopt($ch, CURLOPT_URL, $DownloadableURL);
								curl_setopt($ch, CURLOPT_HEADER, 0);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
								curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
								$_responce = curl_exec($ch);
								curl_close($ch);
								if( strpos( $_responce,'key does not exist' ) || strpos( $_responce,'not found' )  || strpos( $_responce,'Access Denied' ) )
								{
								
								}
								else
								{
									CreateFile($DownloadableURL,$_responce);
								}
							}
							else
							{
								CreateFile($DownloadableURL,$_responce);
							}
						}
						else
						{
							CreateFile($DownloadableURL,$_responce);
						}
					}
					else
					{
						CreateFile($DownloadableURL,$_responce);
					}
				}
				else
				{
					CreateFile($DownloadableURL,$_responce);
				}
			}
			else
			{
				CreateFile($DownloadableURL,$_responce);
			}
		}
		else
		{
			CreateFile($DownloadableURL,$_responce);
		}
	}
}
	


function CreateFile($DownloadableURL,$responce)
{
	
	//$response['status']="success";
	//$response['watermark_removed']="yes";	
	//$response['videourl']=$DownloadableURL;
	//$response['ogvideourl']= $DownloadableURL;
	//echo json_encode($response);
	//echo $responce;

	$result=new ResultModel();
	$result->set_Status("Success");		
	

	$title="MXTakatak";
	$thumbnail="";
	$VideoURL=$DownloadableURL;
	//echo $DownloadableURL;

	$fileSize=GetFileSize($VideoURL);
	$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,"MXTakatak",null,$title,$fileSize);
	$result->set_VideoResults($tmp);

	echo json_encode($result);

}
?>