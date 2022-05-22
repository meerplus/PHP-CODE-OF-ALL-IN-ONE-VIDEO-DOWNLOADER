<?php

function downloadtiktok($URL){

	$result=new ResultModel();
	$result->set_Status("Success");		
	$result->set_InternalDownload(true); 


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://tiktokdownload.online/results",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_SSL_VERIFYHOST=>0,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ic-request\"\r\n\r\ntrue\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"id\"\r\n\r\n".$URL."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ic-element-id\"\r\n\r\nmain_page_form\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ic-id\"\r\n\r\n1\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ic-target-id\"\r\n\r\nactive_container\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ic-trigger-id\"\r\n\r\nmain_page_form\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"token\"\r\n\r\n493eaebbf47aa90e1cdfa0f8faf7d04cle0f45a38aa759c6a13fea91d5036dc3b\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ic-current-url\"\r\n\r\n/\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ic-select-from-response\"\r\n\r\n#id4fbbea\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"_method\"\r\n\r\nPOST\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
    "origin: https://tiktokdownload.online",
    "postman-token: c866af6b-b900-cf0f-2043-1296b0e5362a",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1",
    "x-http-method-override: POST",
    "x-ic-request: true",
    "x-requested-with: XMLHttpRequest"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
  echo "cURL Error #:" . $err;
} else {
 // echo $response;

  $dt=get_string_between($response, "<a class='btn btn-primary download_link without_watermark' style='background:green' target='_blank' href='", "'");

  // echo "https://snaptik.app/dl.php?".$dt;
	$Video_link=$dt;
	$title="Tiktok Video";
	$Thumbnil_link = "";
	$fileSize=GetFileSize($Video_link);
	//$DownloadedLink =DownloadFile($Video_link);
	$tmp=VideoResult::GetVideoResult($Video_link ,$Thumbnil_link,"TikTok",null,$title,$fileSize);
	$result->set_VideoResults($tmp);

	echo json_encode($result);

}

	//echo $data;
	
}

?>