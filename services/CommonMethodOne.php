<?php



	function GetCommons($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);
		$VideoUrl=GetVideoUrl($data);



		$fileSize=GetFileSize($VideoUrl);
		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,get_domain($URL),null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		return $result;

	}

	function DownloadCommonMethodOne($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=GetTitle($data);
		$thumbnail=GetThumbnil($data);
		$VideoUrl=GetVideoUrl($data);



		$fileSize=GetFileSize($VideoUrl);
		$tmp=VideoResult::GetVideoResult($VideoUrl ,$thumbnail,get_domain($URL),null,$title,$fileSize);
		$result->set_VideoResults($tmp);

		echo json_encode($result);

	}

	function GetVideoUrl($data){
		$VidUrl=get_string_between($data,'<source type="video/mp4" src="','.mp4');
		if($VidUrl !=""){
			$VidUrl=$VidUrl.'.mp4';
		}
		if($VidUrl==""){
			$VidUrl=get_string_between($data,'<meta data-rh="true" property="og:video" content="','"/>');			
		}
		if($VidUrl==""){
			$VidUrl=get_string_between($data,'<meta data-react-helmet="true" property="og:video:url" content="','">');			
		}
		if($VidUrl==""){
			$VidUrl=get_string_between($data,'<meta property="og:video" content="','" />');			
		}
		if($VidUrl==""){
			$VidUrl=get_string_between($data,'<meta property="og:video:url" content="','"/>');			
		}
		if($VidUrl==""){
			$VidUrl=get_string_between($data,'<meta data-react-helmet="true" property="og:video" content="','"/>');			
		}

		if($VidUrl !=""){
			$Arr=explode(".mp4",$VidUrl);
			$VidUrl=$Arr[0].".mp4";
		}



		return $VidUrl;
	}

	function GetThumbnil($data){
		$thumb = get_string_between($data, '<meta property="og:image" content="', '"');
		if($thumb==""){
			$thumb=get_string_between($data, "<meta property='og:image' content='", "' />");
		}
		if($thumb==""){
			get_string_between($data, '<meta data-rh="true" property="og:image" content="', '"');
		}
		if($thumb==""){
			$thumb=get_string_between($data, '<meta data-react-helmet="true" property="og:image" content="', '"');
		}
		return $thumb;
	}

	function GetTitle($data){
		$title = get_string_between($data, '<meta property="og:title" content="', '"');
		if($title=="")
		{
			$title=	 get_string_between($data, '<meta data-rh="true" property="og:title" content="', '"');
		}
		if($title=="")
		{
			$title=	 get_string_between($data, '<title>', '</title>');
		}
		if($title=="")
		{
			$title=	 get_string_between($data, '<meta data-react-helmet="true" property="og:title" content="', '"');
		}
		return $title;
	}

?>