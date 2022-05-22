<?php

	function Downloadkooapp($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);
		$VideoURL=get_string_between($data,'href="//fr.vid', '.mp4');

		//echo $thumbnail;


	}

?>