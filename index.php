

<?php include 'init.php' ?>
<?php include 'includes/SiteHelper.php' ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title><?php echo $AppName;?></title>
 	
 	<meta name="keywords" content="<?php echo $Keywords; ?>">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="canonical" href="<?php echo $AppURL; ?>">
 	<meta name="generator" content="<?php echo $AppName;?>" />
 	<meta itemprop="name" content="All in One Video Downloader">
  <meta name="description" content="All in one video downloader script YouTube video downloader script php video downloader script">

  <meta itemprop="image" content="<?php echo $AppURL ?>/styles/img/banner.png">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="All in One Video Downloader">
  <meta name="twitter:description" content="All in one video downloader script YouTube video downloader script php video downloader script">
  <meta name="twitter:image:src" content="<?php echo $AppURL ?>/styles/img/banner.png">

 <meta property="og:title" content="All in One Video Downloader">
 <meta property="og:type" content="article">
 <meta property="og:image" content="<?php echo $AppURL ?>/styles/img/banner.png">
 <meta property="og:description" content="All in one video downloader script YouTube video downloader script php video downloader script">
 <meta property="og:site_name" content="All in One Video Downloader">

	<link rel="shortcut icon" href="styles/img/favicon.ico?ver=1.2" />
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="styles/css/bootstrap.min.css?v=1.1">
 	<link rel="stylesheet" href="styles/css/style5.css?v=1.1.13">
 	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">

 	<script type="text/javascript" src="js/crypto-js.min.js"></script>
 	<script type="text/javascript" src="js/zilihelper.js"></script>
 	


 </head>
 <body>
 <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px;" role="navigation">
<div class="container">
<div class="navbar-header">
 <a class="navbar-brand" href="/" style="color:#fff;"><img style="height:  50px;margin-top: -10px;float: left;" alt="All Sites Video Downloader" src="styles/img/logo.png?v=1"><span style="font-weight: bold;font-size: 23px;"><?php echo $AppName;?></span></a>
</div>
<ul class="nav navbar-nav pull-right">
      <li><a href="#SupportedWebsites">Supported Websites</a></li>
      <li><a href="#Howto">How to</a></li>
      
    </ul>
<div class="collapse navbar-collapse" id="menu">



</div>
</div>
</nav>

<script type="text/javascript" src="js/template1.js?v=1"></script>
<script type="text/javascript" src="js/main.js?v=1"></script>





<div class="jumbotron">
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<center>

<?php echo $Logo;?>

<h1 style="font-size:24px;font-weight:600;margin-top:1%;letter-spacing: -0.7px;" class="MainHeading">

<?php echo $Header; ?>

</h1>


<br>
<div class="form-holder">
<form action="index.php" method="post" id="linkform">
<div class="input-group col-lg-8">
<input name="URL" class="form-control input-lg" placeholder="Insert a link here ..." type="text" >
<span class="input-group-btn"><button class="btn btn-primary input-lg" style="margin-top: -5px;" type="submit"><strong><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> Download</strong></button></span>` 
</div>
</form>
</div>
<br>


<?php include('includes/advt.php') ?>


<br><br>

<span class="cc-notice">
By using this website, you accept our <a style="color:#2c3e50;text-decoration: underline;" href="terms.html">Terms of Service</a> and agree not to download Copyright content.
</span>

<?php echo  $testLinkHTML; ?>

</center>

<div class="loading" style="margin-top:20px;text-align: center;display: none;">
	<img alt="loading" src="styles/img/loading.gif" >
</div>

</div>
</div>
</div>
</div>
<div class="content">
	<div class="block">
		<div class="result"></div>
	</div>

		
	<div class="block">
      <div class="supported-sites">
        <h3 id="SupportedWebsites">Supported Websites</h3>

        <div class="row">

        <?php
        	echo  GenerateSupportedSites();
        ?>

        

        </div>
      </div>
    </div>

	<div class="block">
            <div class="description">
                <h2 id="Howto">How to Download Videos</h2>
                
                <ul class="list-unstyled howto-list">
                                    <li><span class="bullet">1</span>Copy the link of the video/image which you wish to download.</li>
                                    <li><span class="bullet">2</span>Paste the link into the search box at the top of this page, then press Download or the Enter key.</li>
                                    <li><span class="bullet">3</span> Wait while our servers process the video/image, generate download links and displays it to you..</li>
                                    <li><span class="bullet">4</span>Right click on the Download link and choose Save As/Download to save the video to your device.</li>
                                </ul>
            </div>
        </div>
    </div>
<div id="footer" class="well col-md-12" style="margin-bottom: 0px;">
<center>
  <ul>
      <li><a href="/">Home</a></li>
      
      <li><a href="terms.html">Terms</a></li>
      <li><a href="privacy.html">Privacy</a></li>
    </ul>Copyright &copy; 2020. All rights reserved.</center>
</div>



 </body>
 </html>