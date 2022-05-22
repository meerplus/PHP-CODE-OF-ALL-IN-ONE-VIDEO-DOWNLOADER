<?php


	function get_media($curl_content)
    {
        if (preg_match_all('/meta itemprop="contentURL"\s*content="([^"]+)"/', $curl_content, $match)) {
            return $match[1][0];
        } else if (preg_match_all('/property="og:video"\s*content="([^"]+)"/', $curl_content, $match)) {
            return $match[1][0];
        }
    }
    function get_title($curl_content)
    {
        if (preg_match_all('/og:title"\s*content="([^"]+)"/', $curl_content, $match)) {
            return $match[1][0];
        } else if (preg_match_all('/property="og:title"\s*content="([^"]+)"/', $curl_content, $match)) {
            return $match[1][0];
        }
    }

    function get_thumbnail($curl_content)
    {
        if (preg_match_all('/meta itemprop="thumbnailUrl"\s*content="([^"]+)"/', $curl_content, $match)) {
            return $match[1][0];
        } else if (preg_match_all('/property="og:image"\s*content="([^"]+)"/', $curl_content, $match)) {
            return $match[1][0];
        }
    }

	function downloadizlesene($URL){
		$result=new ResultModel();
		$result->set_Status("Success");		
		$data=SendRequest($URL);

		$title=get_title($data);
		$thumbnil=get_thumbnail($data);
		$videoUrl=get_media($data);

		$tmp=VideoResult::GetVideoResult($videoUrl,$thumbnil,"izlesene",null,$title);
		$result->set_VideoResults($tmp);

		echo json_encode($result);

		//echo get_media($data);

	}

?>