<?php

function Downloadxhamster($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		$title = get_string_between($data, "<title>", "</title>");
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '" />');

		$JSONDATA= get_string_between($data, "<script id='initials-script'>window.initials=", ';</script>');

		echo $JSONDATA;
}

?>