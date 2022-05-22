<?php

	function downloadreddit($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$VideoURL = get_string_between($data, '"scrubberThumbSource":"', '"');

		$VideoIdPrifix= (explode("_",$VideoURL)[ 0]);

		$title = get_string_between($data, "<title>", "</title>");
		$thumbnil = get_string_between($data, '<meta property="og:image" content="', '"/>');


		$AudioUrl=$VideoIdPrifix."_audio.mp4";
		$VideoIdTry=$VideoIdPrifix."_1080.mp4";
		$dataTry=SendRequest($VideoIdTry);

		if( strpos($dataTry,"AccessDenied")  )
		{	
			$VideoIdTry=$VideoIdPrifix."_480.mp4";
			$dataTry=SendRequest($VideoIdTry);			

			if( strpos($dataTry,"AccessDenied")  ){
				$VideoIdTry=$VideoIdPrifix."_240.mp4";
				$dataTry=SendRequest($VideoIdTry);							

				if( strpos($dataTry,"AccessDenied")  ){

					$VideoIdTry=$VideoIdPrifix."_720.mp4";
					$dataTry=SendRequest($VideoIdTry);												

					if( strpos($dataTry,"AccessDenied")  ){
						$result->set_Status("Error");		
					}	
					else{
						$VideoURL=$VideoIdTry;
						$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnil,"Reddit",$AudioUrl,$title);
						$result->set_VideoResults($tmp);
						echo json_encode($result);
					}
				}
				else
				{
					$VideoURL=$VideoIdTry;
					$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnil,"Reddit",$AudioUrl,$title);
					$result->set_VideoResults($tmp);
					echo json_encode($result);
				}
			}
			else
			{
				$VideoURL=$VideoIdTry;
				$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnil,"Reddit",$AudioUrl,$title);
				$result->set_VideoResults($tmp);
				echo json_encode($result);
			}
			
		}
		else
		{
			$VideoURL=$VideoIdTry;
			$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnil,"Reddit",$AudioUrl,$title);
			$result->set_VideoResults($tmp);
			echo json_encode($result);
		}

		
		


	}

?>