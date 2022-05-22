<?php



	function downloadLinkedin($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);
		
		$title = get_string_between($data, '<meta property="og:title" content="', '">');
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '">');

		$datasource = get_string_between($data, 'data-sources="', '"');
		$datasource =str_replace("&quot;", '"', $datasource );
		

		$datasource=json_decode($datasource);

		if($datasource !=null){
			$VideoUrl=$datasource[0]->src;

			$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,"Linkedin",null,$title);
			$result->set_VideoResults($tmp);
		}
		echo json_encode($result);

	}
?>