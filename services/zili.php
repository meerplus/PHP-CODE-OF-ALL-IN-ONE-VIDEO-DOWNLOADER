<?php

function downloadZili($URL){
	$result=new ResultModel();
	$result->set_Status("Success");		
	$data=SendRequest($URL);

	$result->set_NeedClientExecution(true);

	$result->set_HTMLData($data);

	echo json_encode($result);
}

	

?>