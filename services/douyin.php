<?php

	function Downloaddouyin($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		echo $data;

	}

?>