<?php
	
	$document_root = $_SERVER['DOCUMENT_ROOT'];
	include ($document_root.'/services/Model/ResultModel.php');
	include ($document_root.'/services/Functions/functions.php');
	
	
	include ('9gag.php');
	include ('facebook.php');
	include ('twitter.php');
	include ('instagram.php');
	include ('blogger.php');
	include ('bandcamp.php');
	include ('bilibili.php');
	include ('dailymotion.php');
	include ('espn.php');
	include ('flickr.php');
	include ('imdb.php');
	include ('imgur.php');
	include ('izlesene.php');
	include ('likee.php');
	include ('liveleak.php');
	include ('okru.php');
	include ('pinterest.php');
	include ('reddit.php');
	include ('bitchute.php');
	include ('Linkedin.php');
	include ('Veoh.php');
	include ('popcornflix.php');
	include ('vimeo.php');
	include ('dtube.php');

	include ('solidfiles.php');
	include ('vidoza.php');
	include ('fansubs.php');
	include ('meme.php');
	include ('kickstarter.php');
	include ('vlive.php');
	include ('vlipsy.php');
	include ('gloria.php');
	include ('wwe.php');
	include ('aparat.php');
	include ('1tvru.php');
	include ('allocine.php');
	include ('audioboom.php');
	include ('audiomack.php');
	include ('traileraddict.php');
	include ('youtube.php');
	include ('veer.php');
	include ('zili.php');
	
	include ('tiktok.php');
	include ('streamable.php');
	include ('MXTakatak-service.php');
	include ('moj.php');
	include ('Ojoo.php');
	include ('resso.php');
	include ('raask.php');
	include ('fairtok.php');
	include ('josh.php');
	include ('kooapp.php');
	include ('Rizzle.php');
	 
	include ('triller.php');
	include ('mitron.php');
	include ('boloindya.php');
	include ('hind.php');
	include ('douyin.php');
	include ('sendvid.php');
	include ('fthis.php');
	include ('coub.php');
	include ('fireworktv.php');
	include ('naver.php');
	include ('xvideos.php');
	include ('rumble.php');
	include ('xhamster.php');
	include ('4shared.php');
	include ('tiktok2.php');

	include ('kwai.php');
	include ('twitch.php');
	include ('ted.php');
	// include ('tiktok2.php');
	// include ('tiktok2.php');
	// include ('tiktok2.php');
	// include ('tiktok2.php');
	// include ('tiktok2.php');
	

	

	include ('CommonMethodOne.php');

	$url=$_POST['url'];
	if( strpos($url,'facebook.com') ||strpos($url,'fb.com')  )
	{
			downloadfacebook($url);
	}
	else if( strpos($url,'9gag.com')  )
	{
			download9gag($url);
	}
	
	else if( strpos($url,'twitter.com')  )
	{
			downloadTwitter($url);
	}
	else if( strpos($url,'instagram.com')  )
	{
			downloadInstagram($url);
	}
	else if( strpos($url,'blogspot.com')  )
	{
			downloadBlogger($url);
	}
	else if( strpos($url,'bandcamp.com')  )
	{
			downloadBandcamp($url);
	}
	else if( strpos($url,'bilibili.com')  )
	{
			downloadbilibili($url);
	}
	else if( strpos($url,'dailymotion.com')  )
	{
			downloaddailymotion($url);
	}
	else if( strpos($url,'espn')  )
	{
			downloadespn($url);
	}
	else if( strpos($url,'imdb')  )
	{
			downloadIMDB($url);
	}
	else if( strpos($url,'imgur')  )
	{
			downloadimgur($url);
	}
	else if( strpos($url,'izlesene')  )
	{
			downloadizlesene($url);
	}
	
	else if( strpos($url,'liveleak')  )
	{
			downloadliveleak($url);
	}
	else if( strpos($url,'ok.ru')  )
	{
			downloadOKRU($url);
	}
	else if( strpos($url,'pinterest')  )
	{
			downloadpinterest($url);
	}
	else if( strpos($url,'reddit')  )
	{
			downloadreddit($url);
	}
	else if( strpos($url,'bitchute')  )
	{
			downloadbitchute($url);
	}
	else if( strpos($url,'linkedin.com')  )
	{
			downloadLinkedin($url);
	}
	else if( strpos($url,'veoh')  )
	{
			downloadVeoh($url);
	}
	else if( strpos($url,'popcornflix')  )
	{
			downloadpopcornflix($url);
	}
	else if( strpos($url,'vimeo')  )
	{
			downloadvimeo($url);
	}
	else if( strpos($url,'d.tube')  )
	{
			downloaddtube($url);
	}
	else if( strpos($url,'sendvid')  )
	{
			downloadsendvid($url);
	}
	else if( strpos($url,'solidfiles')  )
	{
			downloadsolidfiles($url);
	}
	else if( strpos($url,'vidoza')  )
	{
			downloadvidoza($url);
	}
	else if( strpos($url,'fansubs')  )
	{
			downloadfansubs($url);
	}
	else if( strpos($url,'me.me')  )
	{
			downloadmeme($url);
	}
	else if( strpos($url,'vlive')  )
	{
			downloadvlive($url);
	}
	else if( strpos($url,'gloria')  )
	{
			downloadgloria($url);
	}
	else if( strpos($url,'wwe')  )
	{
			downloadwwe($url);
	}
	else if( strpos($url,'aparat')  )
	{
			downloadaparat($url);
	}

	else if( strpos($url,'1tv.ru')  )
	{
			download1tvru($url);
	}


	else if( strpos($url,'kck.st') || strpos($url,'kickstarter')  )
	{
			downloadkickstarter($url);
	}
	else if( strpos($url,'vlipsy') || strpos($url,'vlp.to')  )
	{
			downloadvlipsy($url);
	}
	else if( strpos($url,'flickr') || strpos($url,'flic.kr')  )
	{
			downloadflickr($url);
	}
	else if( strpos($url,'youtube') || strpos($url,'youtu.be')  )
	{
			downloadyoutube($url);
	}
	else if( strpos($url,'likee.video')   || strpos($url,'like.video') )
	{
			downloadlikee($url);
	}

	else if( strpos($url,'tiktok')  )
	{
			downloadtiktok($url);
	}

	
	else if( strpos($url,'allocine')   )
	{
			downloadallocine($url);
	}

	else if( strpos($url,'audioboom')   )
	{
			downloadaudioboom($url);
	}

	else if( strpos($url,'audiomack')   )
	{
			downloadaudiomack($url);
	}	
	else if( strpos($url,'traileraddict')   )
	{
			downloadtraileraddict($url);
	}
	else if( strpos($url,'zilivideo')   )
	{
			downloadZili($url);
	}
	else if( strpos($url,'tezpage')   )
	{
			downloadVeer($url);
	}
	else if( strpos($url,'streamable')   )
	{
			downloadstreamable($url);
	}
	else if( strpos($url,'mxtakatak')   )
	{
			DownloadMXTAKATAK($url);
	}
	else if( strpos($url,'mojapp')   )
	{
			DownloadMOJ($url);
	}
	else if( strpos($url,'bemate.co')   )
	{
			DownloadOjoo($url);
	}
	else if( strpos($url,'resso')   )
	{
			Downloadresso($url);
	}
	else if( strpos($url,'raask.in')   )
	{
			DownloadRaask($url);
	}
	else if( strpos($url,'fairtok')   )
	{
			Downloadfairtok($url);
	}
	else if( strpos($url,'share.myjosh')   )
	{
			DownloadJosh($url);
	}
	else if( strpos($url,'rizzle')   )
	{
			Downloadrizzle($url);
	}
	else if( strpos($url,'triller')   )
	{
			Downloadtriller($url);
	}
	else if( strpos($url,'mitron')   )
	{
			Downloadmitron($url);
	}
	else if( strpos($url,'boloindya')   )
	{
			Downloadboloindya($url);
	}
	else if( strpos($url,'hind.app')   )
	{
			DownloadHind($url);
	}
	else if( strpos($url,'douyin')   )
	{
			Downloaddouyin($url);
	}
	else if( strpos($url,'fthis')   )
	{
			Downloadfthis($url);
	}
	else if( strpos($url,'coub.com')   )
	{
			Downloadcoub($url);
	}
	else if( strpos($url,'tv.naver.com')   )
	{
			Downloadnaver($url);
	}
	else if( strpos($url,'fireworktv.com')   || strpos($url,'fw.tv') )
	{
			Downloadfireworktv($url);
	}
	else if( strpos($url,'xvideos') || strpos($url,'xnxx') )
	{
			Downloadxvideos($url);
	}
	else if( strpos($url,'rumble.com') )
	{
			Downloadrumble($url);
	}
	else if( strpos($url,'xhamster') )
	{
			Downloadxhamster($url);
	}
	else if( strpos($url,'4shared') )
	{
			Download4shared($url);
	}
	else if( strpos($url,'twitch.tv') )
	{
			Downloadtwitch($url);
	}
	else if( strpos($url,'ted.com/') )
	{
			DownloadTED($url);
	}
	else if( strpos($url,'kw.ai/') || strpos($url,'kwai.com') )
	{
			Downloadkwai($url);
	}
	else
	{
		DownloadCommonMethodOne($url);
	}

	


	

	
	
	
	
?>