<?php


function Downloadfairtok($URL){

	$StringId= (explode("/",$URL)[ count(explode("/",$URL))-1 ] );

	$Body="{\"device_fingerprint_id\":\"838529202513017602\",\"identity_id\":\"838529202537882206\",\"hardware_id\":\"ebb088d29e7287b1\",\"is_hardware_id_real\":true,\"brand\":\"samsung\",\"model\":\"SM-J200G\",\"screen_dpi\":240,\"screen_height\":960,\"screen_width\":540,\"wifi\":true,\"ui_mode\":\"UI_MODE_TYPE_NORMAL\",\"os\":\"Android\",\"os_version\":22,\"cpu_type\":\"armv7l\",\"build\":\"LMY47X.J200GDCU2ARL1\",\"locale\":\"en_GB\",\"connection_type\":\"wifi\",\"os_version_android\":\"5.1.1\",\"country\":\"GB\",\"language\":\"en\",\"local_ip\":\"192.168.43.18\",\"app_version\":\"1.19\",\"facebook_app_link_checked\":false,\"is_referrable\":0,\"debug\":false,\"update\":1,\"latest_install_time\":1601158937336,\"latest_update_time\":1601158937336,\"first_install_time\":1601158937336,\"previous_update_time\":1601158937336,\"environment\":\"FULL_APP\",\"android_app_link_url\":\"https:\\/\\/fairtok.app.link\\/".$StringId."\",\"external_intent_uri\":\"https:\\/\\/fairtok.app.link\\/Y7ov2al149\",\"cd\":{\"mv\":\"-1\",\"pn\":\"com.fairtok\"},\"metadata\":{},\"advertising_ids\":{\"aaid\":\"094dfa1f-77cf-4f84-b373-2c15bf74f9d1\"},\"lat_val\":0,\"google_advertising_id\":\"094dfa1f-77cf-4f84-b373-2c15bf74f9d1\",\"instrumentation\":{\"v1\\/open-qwt\":\"0\"},\"sdk\":\"android5.0.1\",\"branch_key\":\"key_live_hjLYp0Wi3i6R1qQ1Lr51TlpcBvkxEp53\",\"retryNumber\":0}";

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api2.branch.io/v1/open",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_SSL_VERIFYPEER=> false,
  	  CURLOPT_SSL_VERIFYHOST=>0,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => $Body,
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	//echo $err;
	//echo $response;
	$response=json_decode($response);
	$response=json_decode($response->data);
	$response=json_decode($response->data);

	$result=new ResultModel();
	$result->set_Status("Success");		
	$data=SendRequest($URL);

	$VideoURL= "https://bucket-fairtok.s3.ap-south-1.amazonaws.com/".$response->post_video ;
	$title=$response->post_description;
	$thumbnail="https://bucket-fairtok.s3.ap-south-1.amazonaws.com/".$response->post_image ;
	//echo $thumbnil;

	$fileSize=GetFileSize($VideoURL);
	$tmp=VideoResult::GetVideoResult($VideoURL ,$thumbnail,"fairtok",null,$title,$fileSize);
	$result->set_VideoResults($tmp);

	echo json_encode($result);

}

?>