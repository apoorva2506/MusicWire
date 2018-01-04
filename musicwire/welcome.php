<!DOCTYPE html>
<html>
<head>
<title>Music Wire</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Music Club Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>
<!--header-->
<div class="header">
	<div class="container">
			<div class="header-top">
				<div class="logo">
					<h1><a href="welcome.php">Music Wire</a></h1>
				</div>
				<div class="top-nav">
					<span class="menu"><img src="images/menu.png" alt=""> </span>
					<ul>
						<li><a href="welcome.php" class="hvr-sweep-to-bottom color"><i class="glyphicon glyphicon-home"></i>Home </a></li>
						<li ><a href="profile.php" class="hvr-sweep-to-bottom color1"><i class="glyphicon glyphicon-picture"></i>My Profile  </a> </li>
						<li ><a href="browse.php" class="hvr-sweep-to-bottom color2"><i class="glyphicon glyphicon-picture"></i>Browse  </a> </li>
						<li><a href="logout.php" class="hvr-sweep-to-bottom color3"><i class="glyphicon glyphicon-home"></i>Logout </a></li>
					<div class="clearfix"> </div>
					</ul>
					<!--script-->
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
			</script>	<br><br><br>			
				</div><br><br><br>
			<div class="clearfix"> </div>
		</div>
 				 <br><br><br><br><br><br>
		<!--div class="banner-main">
	  <section class="slider">
           <div class="flexslider">
             <ul class="slides">
				   <li>
				   	<div class="col-md-4 mid">
				<a href="most_played.php"><img src="images/b1.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Most Played</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
				   </li>
				    <li>
				   	<div class="col-md-4 mid">
				<a href="best_rated.php"><img src="images/b2.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Best Rated</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
				   </li>
				    <li>
				   	<div class="col-md-4 mid">
				<a href="top_artists.php"><img src="images/4.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Top Artists</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
				   </li>
          </ul>
        </div>
      </section>

</div-->
<!--FlexSlider-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

		<!--content-top-->
		<div class="content-top" style="float:center"><br><br><br>
			<center><div class="col-md-7 content-top1" style="float:center">
				<h1 style="background-color: #a786cc;">Play your favorites, discover new tracks, and build the perfect collection.</h1>
			</div></center>
			<!--div class="col-md-5 top-col">
				<div class="col1">
					<div class="col-md-6 col2">
						<img src="images/ic.png" alt="" >
					</div>
					<div class="col-md-6 col3">
						<img src="images/ic1.png" alt="" >
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col1">
					<div class="col-md-6 col4">
						<img src="images/ic2.png" alt="" >
					</div>
					<div class="col-md-6 col5">
						<img src="images/ic3.png" alt="" >
					</div>
					<div class="clearfix"> </div>
				</div>
			</div-->
			<div class="clearfix"> </div>
		</div>
		<!--//content-top-->
		<!--content-mid-->
		<!--div class="content-mid">
			<div class="col-md-4 mid">
 				 <br><br><br><br><br><br>
 				 <br><br><br><br><br><br>
				<a href="most_played.php"><img src="images/1.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Most Played</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
 				 <br><br><br><br><br><br>
 				 <br><br><br><br><br><br>
				<a href="best_rated.php"><img src="images/2.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Best Rated</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
 				 <br><br><br><br><br><br>
 				 <br><br><br><br><br><br>
				<a href="top_artists.php"><img src="images/4.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Top Artists</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="clearfix"> </div>
		</div-->
		<!--content-mid-->

	</div>
</div>
<!--//header-->
		<!--content-mid-->
		<div class="content-mid">
			<div class="col-md-4 mid">
				<a href="most_played.php"><img src="images/1.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Most Played</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
				<a href="best_rated.php"><img src="images/2.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Best Rated</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
				<a href="top_artists.php"><img src="images/4.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Top Artists</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!--content-mid-->
	</div>
	
	<!---->
</div>
<!--//content-->
<!--footer-->
<div class="footer">
	<div class="container">
		<h2><a href="index.html"> Music Wire</a></h2>
		
					<ul>
						<li ><a href="welcome.php" >Home  </a> </li>
						<li ><a href="profile.php" >My Profile  </a> </li>
						<li><a href="browse.php"  >Browse</a></li>
						<div class="clearfix"> </div>
					</ul>
	</div>
</div>
<!--//footer-->
</body>
</html>