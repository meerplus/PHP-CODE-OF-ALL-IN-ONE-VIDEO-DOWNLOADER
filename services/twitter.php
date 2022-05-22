<?php


function downloadTwitter($URL)
{

	if(strrpos($URL, '?')){
		$URL=explode("?",$URL)[0];
	}

	$result=new ResultModel();
	$result->set_Status("Success");		
	
	$VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );
	$twitData= get_data($VideoId);
	
	$Thumbnil_link = $twitData["entities"]["media"][0]["media_url_https"];
	
	foreach($twitData["extended_entities"]["media"][0]["video_info"]["variants"] as $video)
	{
		if ($video["content_type"] == "video/mp4")
		{
				$Video_link =$video["url"];
		}
			
	}

	
	//$Video_link=$twitData["extended_entities"]["media"][0]["video_info"]["variants"][1]["url"];
		$tmp=VideoResult::GetVideoResult($Video_link ,$Thumbnil_link,"Twitter");
		$result->set_VideoResults($tmp);
		
		echo json_encode($result);		
}

function get_data($VideoId)
    {
		//http://localhost/VideoDownloader//services/codebird-cors-proxy/oauth2/token
        $curl = curl_init();
        //$token_data = $this->get_token();

        include ('../init.php');

        $token_data["access_token"] = "AAAAAAAAAAAAAAAAAAAAANRILgAAAAAAnNwIzUejRCOuH5E6I8xnZz4puTs%3D1Zv7ttfk8LF81IUq16cHjhLTvJu4FA33AGWWjCpTnA";
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  $AppURL."/services/codebird-cors-proxy//1.1/statuses/show/".$VideoId.".json?tweet_mode=extended&include_entities=true",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-authorization: Bearer " . $token_data["access_token"]
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return false;
        } else {
			// return print_r($response);
			return json_decode($response, true);
            //return json_decode($response, true);
        }
    }
	
	
?>