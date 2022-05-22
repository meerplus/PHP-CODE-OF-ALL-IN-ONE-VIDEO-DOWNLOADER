<?php header("Content-type: text/xml"); ?>
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">


<?php

	include 'init.php';
	$str = file_get_contents('js/services.json'); 

	$Services=json_decode($str);
	$stream="";
	foreach ($Services as $key ) {

	echo' <url> ';
	echo'	 <loc> '. $AppURL .'index.php?s='. $key->Name .'</loc> ';
	echo'	 <changefreq>weekly</changefreq> ';
	echo'	</url> ';


	}
?>



</urlset>