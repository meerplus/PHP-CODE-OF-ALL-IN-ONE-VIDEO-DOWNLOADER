<?php


	function Downloadnaver($URL){

		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);
		$VideoID=get_string_between($data,'<meta property="naver:video:id" content="','">') ;	

		$APIURL='https://apis.naver.com/rmcnmv/rmcnmv/vod/play/v2.0/'.$VideoID.'?key=V129efc487b8724c87c54b1300f97b3a97fe1848ec60018863168090feeebd15a066bb1300f97b3a97fe1&sid=2010&pid=4f38b418-4dd8-4cb3-a31e-08e5e310e256&nonce=1604153241302&devt=html5_pc&prv=N&aup=N&stpb=N&cpl=en&adi=%5B%7B%22adSystem%22%3A%22null%22%7D%5D&adu=%2F&providerEnv=real';

		$APIdata=SendRequest($APIURL);
		echo $APIdata;




	}

?>