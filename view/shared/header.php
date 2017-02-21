<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Blog PHP/OOP</title>
<link href="content/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="content/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="content/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Blog created with PHP/OOP using the MVC architecture and bootstrap/twig." />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="content/js/jquery.min.js"></script>
<script>
		$(document).ready(function () {
		    size_li = $("#myList li").size();
		    x=3;
		    $('#myList li:lt('+x+')').show();
		    $('#loadMore').click(function () {
		        x= (x+1 <= size_li) ? x+1 : size_li;
		        $('#myList li:lt('+x+')').show();
		    });
		    $('#showLess').click(function () {
		        x=(x-1<0) ? 1 : x-1;
		        $('#myList li').not(':lt('+x+')').hide();
		    });
		});
	</script>

</head>
<body>
<!-- header -->
<div class="banner">
	<div class="container">
		<div class="header">
			<div class="logo">
				<a href="<?=ROOT_URL?>"><img src="content/images/logo.png" class="img-responsive" alt="" /></a>
			</div>
				<div class="clearfix"> </div>
			</div>
				<div class="head-nav">
					<span class="menu"> </span>
						<ul class="cl-effect-15">
							<li><a href="<?=ROOT_URL?>">HOME</a></li>
							<li><a href="<?=ROOT_URL?>?p=blogController&amp;a=blogPosts" data-hover="BLOG">BLOG</a></li>
							<li><a href="<?=ROOT_URL?>?p=blogController&amp;a=add" data-hover="ADD A NEW POST">ADD A NEW POST</a></li>
								<div class="clearfix"> </div>
						</ul>
				</div>

						<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".head-nav ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav --> 					 
	</div> 
</div>
<!-- header -->