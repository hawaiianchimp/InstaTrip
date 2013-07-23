<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>InstaTrip</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Scada:700' rel='stylesheet' type='text/css'>
    <style type="text/css">
		html,body{ margin:0; padding:0; height:100%; width:100%; font: 16px 'Helvetica Neue',Arial,sans-serif;}
		h1 {
			margin:0;
			padding:0;
			padding-top:90px;
			font-family: 'Scada', sans-serif;	
			font-size:190px;
			text-shadow: 0 0 40px rgba(255,255,255, 0.8);
			color:#fff;
		}
		h2{
			font-size:40px;	
			color:#fff;
			margin:0;
			padding:0;
			margin-top:-25px;
			padding-bottom:50px;
			text-shadow: 0 0 20px rgba(0,0,0, 0.4);
		}
		#cover {
			text-align:center;
			height:100%;
		  	width:100%;
		  	overflow:hidden; /* or overflow:auto; if you want scrollbars */
			background: url(images/background2.png) no-repeat center center;
			-webkit-background-size: cover;	
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		#content{
			margin: 0 auto;
			width:600px;
			padding: 5px 5px;
			font-size:30px;
			color: #fff;
			background-color: rgba(0, 0, 0, 0.6);	
		}
		.start{
			border: 1px solid #969696;
			border-radius: 6px;
			color: #444;
			cursor: pointer;
			font-size:30px;
			padding: 8px 50px;
			text-decoration: none;
			text-shadow: 0 1px #fff;
			box-shadow: 0 0 24px #c8c8c8;	
			background-image: -webkit-gradient(linear,0 0,0 100%,from(#f2f2f2),color-stop(0.25,#f2f2f2),to(#dcdcdc));
			background-image: linear-gradient(#dcdcdc, #dcdcdc 0px, #f2f2f2);
		}
		
		.start:hover {
			box-shadow: 0 0 35px #c8c8c8;	
		}
		
		.partners{
			color:#999999;
			font-weight:bold;
			margin:60px 0;
			padding:5px;
			background-color: rgba(0, 0, 0, 0.6);
		}
		
		.devs a, .devs a:hover, .devs a:active, .devs a:visited{
			color:#fff;	
			text-shadow: 0 1px #000;
		}
		
		.devs{
			text-align:center; 
			margin-top:50px;
			color:#fff;
			text-shadow: 0 1px #000;
			}
    </style>
  </head>
  <body>
	<div id="cover">
		<h1>InstaTrip</h1>
		<h2>You're Going To Wish You Were Here</h2>
		<a class="start" href="500pxauth">Choose your destination</a>
		
		<div class="partners">
			Powered by<br>
			<img src="images/flashfoto.png"/>
			<img src="images/dropbox.png"/>
			<img src="images/sincerely.png"/>
			<img src="images/500px.png"/>
			<img src="images/aviary.png"/>
			<img src="images/filepickerio.png"/>
		</div>
		<div class="devs"><p>Developed by <a href="http://www.seantburke.com/?r=instatrip" target="_BLANK">Sean Thomas Burke</a> and <a href="http://www.mrjorgezamora.com" target="_BLANK">Jorge Zamora</a></p></div>
	</div>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-39941507-1', 'seantburke.com');
	  ga('send', 'pageview');
	
	</script>
  </body>
</html>
