<?php

	function downloadvimeo($URL){

		$data = SendRequest($URL);
		$title = get_string_between($data, '<meta property="og:title" content="', '">');
		$thumbnail = get_string_between($data, '<meta property="og:image" content="', '">');
		$config = get_string_between($data, "window.vimeo.clip_page_config =", "}}};");
		$config=$config."}}}";
		$config=json_decode($config);
		$config_url= $config->player->config_url;
		$Configdata = SendRequest($config_url );
		$Configdata=json_decode($Configdata);
		$progressiveArray=$Configdata->request->files->progressive;
		$VideoUrl= $progressiveArray[ count($progressiveArray) -1 ]->url;
		$result=new ResultModel();
		$result->set_Status("Success");		
		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,"vimeo",null,$title);
		$result->set_VideoResults($tmp);

		echo json_encode($result);		
	}

?>