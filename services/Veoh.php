<?php

	function downloadVeoh($URL){
		
		$result=new ResultModel();
		$result->set_Status("Success");		
		$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );
		
		//$dataVeoh = SendRequest("http://www.veoh.com/watch/getVideo/".$VideoId);
		$dataVeoh=SendRequest($URL);
		$dataVeoh=file_get_contents("http://www.veoh.com/watch/getVideo/".$VideoId);

		echo  $dataVeoh ;

	}

?>