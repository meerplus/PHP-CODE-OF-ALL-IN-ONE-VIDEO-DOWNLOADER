<?php



	$str = file_get_contents('js/services.json');

	$CurrentService; 

	$Services=json_decode($str);
	$Keywords="";
	$testLinkHTML="";
	foreach ($Services as $key ) {
		$Keywords .=  $key->Name ." Video Downloader, ";

		if( isset($_GET['s']) ){
				if($_GET['s']==$key->Name){
					$CurrentService=$key;
				}
		}
	}
	

	$Header=$AppHeading ;
	$Logo="";
	

	if( isset($_GET['s']) ){


		$Header  =$_GET['s'] . " Video Downloader";
		$Logo =' <a href="'. $CurrentService->ServiceUrl .'" target="_blank"> <img  class="supported-site-logo" src="logos/'. $_GET['s'] .'.webp" alt="'.$Header.'"></a>';

		foreach ($CurrentService->TestUrls as $key ) {
			$testLinkHTML .="<li>". $key->Url ."</li>";
		}
		if($testLinkHTML !=""){
			$testLinkHTML="<br><br><b>Test Links</b><br><ul>".$testLinkHTML."<ul>";
		}
		if($ShowTestLinks==false){
			$testLinkHTML="";	
		}
	}


function GenerateSupportedSites(){

	
	$str = file_get_contents('js/services.json'); 

	$Services=json_decode($str);
	$stream="";
	foreach ($Services as $key ) {
		
		
		$stream= $stream. 	'  <div class="col-md-2 col-sm-2 col-xs-4 ">';
		$stream= $stream.	' <a class="servicename" href="index.php?s='.$key->Name.'">';
		$stream= $stream. 	'              <div class="preview">';
		$stream= $stream. 	'                <div class="icon">';
		$stream= $stream. 	'                  <img  title="'.$key->Name.' Video Downloader"  alt="'.$key->Name.' Video Downloader" src="logos/'.$key->Name.'.webp" style="width:100%;height:100%">';
		$stream= $stream. 	'                </div>';
		$stream= $stream. 	'                <div class="label">'. $key->Name .'</div>';
		$stream= $stream. 	'              </div>';
		$stream= $stream. 	' </a>';
		$stream= $stream. 	'              </div>';
		

	}

return $stream;
}


?>