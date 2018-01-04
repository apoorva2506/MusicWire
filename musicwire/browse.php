<?php
session_start(); // Starting Session

$error=''; // Variable To Store Error Message
//if (isset($_POST['submit'])) {
if (empty($_SESSION['login_id'])) {
$error = "Invalid Session";
    header("location: invalid_session.php");
}
else
{
$user_id=$_SESSION['login_id'];
$user_name=$_SESSION['login_user'];
$kw = $_GET['keyword'];
$keyword="%" . $_GET['keyword'] . "%";
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$user = 'sneha';
$pwd = 'sneha';
$db = 'MusicWire';
$host = 'localhost';
$port = 8889;
//echo "$user+$password+$db+$host+$port";
$connection = new mysqli($host, $user, $pwd, $db);
// check connection
if ($connection->connect_error) {
  trigger_error('Database connection failed: '  . $connection->connect_error, E_USER_ERROR);
}
//echo 'Connected successfully.<br/>';

$query = $connection -> prepare("SELECT username,uemailid,lastname FROM users WHERE uid=?");
$query->bind_param('s', $user_id);
$query->execute();
$query->store_result();
$rows = $query->num_rows;
?>
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
<script>
function play(track) {
	//alert(track);
   location.href ="play.php?id="+track; 
                return false; 
}

function add_playlist(track) {
	//alert(track);
   location.href ="add_playlist.php?id="+track; 
                return false; 
}

</script>
</head>
<body>
	<form name="browse">
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
			</script>				
				</div>
			<div class="clearfix"> </div><br><br><br><br>
		<div class="blog">
		<div class="container">
					<div class="blog-grid">
						<div class="lone-line">
						<h4>Search Tracks<br></h4>
							<div class="clearfix"> </div>
						<div class="top-comment-right">
					   <div class="search">
					      <input type="text" name="keyword" class="searchTerm" placeholder="Search tracks">
					      <button type="submit" class="searchButton" onclick="location.href='browse.php?keyword='+ document.getElementById('keyword').value;">
					        <i class="fa fa-search"></i>
					     </button>
					   </div></div>

					<div class="comment-top">
				<div class="story">
					<h4 ></h4>
				</div>
							<div class="clearfix"> </div>
				<!---->
				<?php if($kw != "") { ?>

				<div class="comments-top-top">
					<div class="top-comment-left">
					</div>
				
						<div class="top-comment-right">
						<div class="right-comment">
							<br/> <b> Search results: </b>
						</div>						
					</div>
				<br><br><br>
					<div class="top-comment-right">
						<div class="right-comment">
							<div class="clearfix"> </div>
							<table> 
								<?php 
							$query = $connection -> prepare("SELECT tid,ttitle,aname from artist natural join track natural join album where aname like ? or ttitle like ? or adesc like ?");
						$query->bind_param('sss', $keyword,$keyword,$keyword);
						$query->execute();
						$query->store_result();
						$rows = $query->num_rows;
							if ($rows >= 1) {
 							$query->bind_result($tid, $title, $artist);
							while ($query->fetch()) { ?>

							<tr><td width="70%"> <h5><?php echo $title; ?> 
								 -  <?php echo $artist; ?>
								</h5></td>
							<td width="10%"><button type="button" class="btn btn-sm btn-info" onclick="play('<?php echo $tid;?>')"> Play </button></td>
						<td width="20%"><button type="button" class="btn btn-sm btn-warning" onclick="add_playlist('<?php echo $tid;?>')">Add to a Playlist</button></td></tr>
						<?php   } ?></table>
							<div class="clearfix"> </div>
						</div>
					</div>
						<?php    } else { ?>
					<div class="clearfix"> </div>
						<div class="top-comment-right">
						<div class="right-comment">
							<table> <tr>


							<td><p> No results found  </p> </td></tr></table>
						</div>						
					</div>

						<?php	}?>
							<div class="clearfix"> </div>
							<div class="clearfix"> </div>	
				</div>
				<?php 	} ?>
				</div>
			<!---->
			</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
<!--//header-->
<!--content-->
		<!--content-mid-->
		<div class="content-mid">
			<div class="col-md-4 mid">
				<a href="recent_tracks.php"><img src="images/a9.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Recently Played</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
				<a href="myplaylists.php"><img src="images/a7.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>My Playlists</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
				<a href="latest_tracks.php"><img src="images/a1.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Latest Tracks</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
				<br><a href="latest_albums.php"><img src="images/a2.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Latest Albums</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
				<br><a href="latest_playlists.php"><img src="images/a5.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Latest playlists</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!--content-mid-->
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
</form>
</body>
</html>

<?php


$query->close();
$connection -> close(); // Closing Connection
}
?>