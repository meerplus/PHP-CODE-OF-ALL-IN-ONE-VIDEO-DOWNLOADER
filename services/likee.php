<?php


	function downloadlikee($URL)
	{

        if (strpos($URL, 'likee.video') !== false) {
            
            $VideoId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );
            $URL="https://like.video/s/". $VideoId;       

            }
		

        $data=SendRequest($URL);
        $VideoURL = get_string_between($data, '"video_water_url":"', '"');
        $VideoURL =str_replace("\/","/",$VideoURL);
        $VideoURL=str_replace("_4.mp4",".mp4",$VideoURL);

        $result=new ResultModel();
        $result->set_Status("Success");     

        $title=GetTitle($data);
        $thumbnail=GetThumbnil($data);

        $fileSize=GetFileSize($VideoURL);
        $tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,"Likee",null,$title,$fileSize);
        $result->set_VideoResults($tmp);

        echo json_encode($result);		
	}


	function get_likee_video_data($VideoId){
		$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://likee.com/app/videoApi/getVideoInfo",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "postIds=$VideoId",
            CURLOPT_HTTPHEADER => array(
                "authority: likee.com",
                "accept: application/json, text/plain, */*",
                "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36",
                "content-type: application/x-www-form-urlencoded",
                "origin: https://likee.com",
                "sec-fetch-site: same-origin",
                "sec-fetch-mode: cors",
                "referer: https://likee.com/",
                "accept-encoding: gzip, deflate, br",
                "accept-language: en-GB,en;q=0.9,tr-TR;q=0.8,tr;q=0.7,en-US;q=0.6"
            ),
        ));
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
		    $error_msg = curl_error($curl);
		    echo $error_msg;
		}
        curl_close($curl);
        echo $response;
        //return json_decode($response, true)["data"][0];
	}
	

?>