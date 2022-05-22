<?php

function downloadvidoza($URL){
		
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		echo $data;

		$title = get_string_between($data, "<title>", "</title>");
		$JSONData=get_string_between($data, 'source src="', '"');

		//echo $JSONData;
}

?>