<?php

	function Downloadresso($URL){

		$TrackId=$VideoURL=get_string_between($URL,'track?id=', '&');

		//echo $TrackId;


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.resso.app/resso/track/detail?device_platform=web&sim_region=in&track_id=".$TrackId."&player_ver=1",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_SSL_VERIFYPEER=> false,
  		  CURLOPT_SSL_VERIFYHOST=>0,
		  CURLOPT_HTTPHEADER => array(
		    "accept: application/json, text/plain, */*",
		    "accept-encoding: gzip",
		    "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
		    "cache-control: no-cache",
		    "origin: https://h5.resso.app",
		    "postman-token: 1cbeae97-ef04-5afe-a2eb-451d27922a8a",
		    "referer: https://h5.resso.app/",
		    "sec-fetch-dest: empty",
		    "sec-fetch-mode: cors",
		    "sec-fetch-site: same-site",
		    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36"
		  ),
		));

		$TrackDetail = curl_exec($curl);



		//$TrackDetail=SendRequest("https://api.resso.app/resso/track/detail?device_platform=web&sim_region=in&track_id=".$TrackId."&player_ver=1");

		$TrackDetail=json_decode($TrackDetail);

		$media_id=$TrackDetail->player_info->media_id;
		$authorization=$TrackDetail->player_info->authorization;
		$url_player_info=$TrackDetail->player_info->url_player_info;


		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url_player_info,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_SSL_VERIFYPEER=> false,
  		  CURLOPT_SSL_VERIFYHOST=>0,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "accept: application/json, text/plain, */*",
		    "accept-encoding: gzip",
		    "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
		    "authorization: ".$authorization,
		    "cache-control: no-cache",
		    "origin: https://h5.resso.app",
		    "referer: https://h5.resso.app/",
		    "sec-fetch-dest: empty",
		    "sec-fetch-mode: cors",
		    "sec-fetch-site: same-site",
		    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		//echo $err;

		//echo $response;

		$FinalData=json_decode($response);
		$FinalTrackURL=base64_decode($FinalData->video_info->data->video_list->video_1->main_url);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $FinalTrackURL,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_SSL_VERIFYPEER=> false,
  		  CURLOPT_SSL_VERIFYHOST=>0,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "accept: */*",
		    "accept-encoding: identity;q=1, *;q=0",
		    "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
		    "range: bytes=0-",
		    "referer: https://h5.resso.app/",
		    "sec-fetch-dest: audio",
		    "sec-fetch-mode: no-cors",
		    "sec-fetch-site: cross-site",
		    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36"
		  ),
		));

		$response = curl_exec($curl);
		//file_put_contents(dirname(__FILE__) . '/audio.mp4', $response);
		//echo base64_decode($FinalData->video_info->data->video_list->video_1->main_url);

	}

?>