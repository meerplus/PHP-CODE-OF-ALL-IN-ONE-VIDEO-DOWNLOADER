<?php


	function Downloadtwitch($URL){
		$clip_name ='779555411';
		echo json_encode(api_request( $clip_name));

	}

	function get_clip_name($url)
    {
        $parsed_url = parse_url($url);
        $path = explode("/", $parsed_url["path"]);
        if (count($path) == 2) {
            return $path[1];
        } else if ($path[2] == "clip" && isset($path[3]) != "") {
            return $path[3];
        } else {
            return false;
        }
    }

       function generate_operation($clip_name)
    {
        $operation = array(
            0 =>
                array(
                    'operationName' => 'VideoAccessToken_Clip',
                    'variables' =>
                        array(
                            'slug' => $clip_name,
                        ),
                    'extensions' =>
                        array(
                            'persistedQuery' =>
                                array(
                                    'version' => 1,
                                    'sha256Hash' => '9bfcc0177bffc730bd5a5a89005869d2773480cf1738c592143b5173634b7d15',
                                ),
                        ),
                ),
        );
        return json_encode($operation);
    }

     function api_request($clip_name)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://gql.twitch.tv/gql",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYPEER=>false,
            CURLOPT_SSL_VERIFYHOST=>0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => generate_operation($clip_name),
            CURLOPT_HTTPHEADER => array(
                "Client-Id: kimne78kx3ncx6brgo4mv6wki5h1ko",
                "Content-Type: application/json"
            ),
        ));
        $response = curl_exec($curl);
          if (curl_errno($curl)) {
                return curl_error($curl);
            }
        curl_close($curl);
        return json_decode($response, true)[0];
    }

?>