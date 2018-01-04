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
$tid=$_GET['id'];
$user_id=$_SESSION['login_id'];
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

	$query1 = $connection -> prepare("SELECT rating FROM rating WHERE uid=? and trackid=?");
	$query1->bind_param('is', $user_id,$tid);
	$query1->execute();
	$query1->store_result();
	$rows1 = $query1->num_rows;
	if ($rows1 >= 1) {
	$query1->bind_result($rating);
	while ($query1->fetch()) { 
		$rating = $rating;
	}	} else {
		$error = "Unable to fetch";
		$rating = 0;
		}

$query = $connection -> prepare("SELECT ttitle,tduration, albumTitle,aname,albumDate, albumId, aid,tlink FROM artist natural join track natural join album WHERE tid=?");
$query->bind_param('s', $tid);
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
<!--flexslider-->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!--//flexslider-->
  <script type="text/javascript">
  
   function change(id)
   {
      var cname=document.getElementById(id).className;
      var ab=document.getElementById(id+"_hidden").value;
      document.getElementById("rating").innerHTML=ab;

      for(var i=ab;i>=1;i--)
      {
         document.getElementById("rate"+i).src="images/star2.png";
      }
      var id=parseInt(ab)+1;
      for(var j=id;j<=5;j++)
      {
         document.getElementById("rate"+j).src="images/star1.png";
      }
   }

   function rate(id) {
   		var rate = id.substring(4, 5);
   		location.href ="rating.php?rate="+rate+"&tid=<?php echo $tid;?>"; 
                return false; 
	}

  function load()
   {
      var rate=<?php echo $rating;?>;

      for(var i=1;i<=rate;i++)
      {
         document.getElementById("rate"+i).src="images/star2.png";
      }
      for(var i=rate+1;i<=5;i++)
      {
         document.getElementById("rate"+i).src="images/star1.png";
      }
   }

	function add_playlist(track) {
		//alert(track);
	   location.href ="add_playlist.php?id="+track; 
	                return false; 
	}
</script>
</head>
<body onload="load()">
	<form method="post" action="rating.php">
<!--header-->
<div class="header header-main">
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
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--//header-->
<!--content-->
	<div class="blog">
		<div class="container">
					<div class="blog-grid">
					<div class="lone-line">
						<h4>Track Details</h4>
					
					<div class="comment-top">
				<div class="story">
					<h4 ></h4>
				</div>
				<!---->
				<div class="comments-top-top">
					<div class="top-comment-left">
					</div>
						<?php 
							if ($rows >= 1) {
 							$query->bind_result($ttitle,$tduration, $albumTitle,$aname,$albumDate, $albumId, $aid, $tlink);
							while ($query->fetch()) { ?>
					<div class="top-comment-right">
						<div class="right-comment">
							<h5> <?php echo $ttitle; ?></h5>
							<center><button type="button" class="btn btn-sm btn-warning" onclick="add_playlist('<?php echo $tid;?>')">Add to a Playlist</button></center>
							<div class="clearfix"> </div>
							
							<p><table cellpadding=5 cellspacing=5>
								<tr><td>Artist Name: </td><td><a href="artistinfo.php?id=<?php echo $aid; ?>"> <?php echo $aname; ?></a></td></tr>
							<tr><td>Track Duration: </td><td><?php echo $tduration; ?></td></tr>
							<tr><td>Album Name: </td><td><?php echo $albumTitle; ?></td></tr>
							<tr><td>Release Date: </td><td><?php echo $albumDate; ?></td></tr>
								
								 <tr><td>Rating:  </td><td>  
									  <input type="hidden" id="rate1_hidden" value="1">
									  <img src="images/star1.png" width='40px' height="40px" onclick="rate(this.id)" onmouseover="change(this.id);" onmouseout="load()" id="rate1">
									  <input type="hidden" id="rate2_hidden" value="2">
									  <img src="images/star1.png" width='40px' height="40px" onclick="rate(this.id)" onmouseover="change(this.id);" onmouseout="load()" id="rate2">
									  <input type="hidden" id="rate3_hidden" value="3">
									  <img src="images/star1.png" width='40px' height="40px" onclick="rate(this.id)" onmouseover="change(this.id);" onmouseout="load()" id="rate3">
									  <input type="hidden" id="rate4_hidden" value="4">
									  <img src="images/star1.png" width='40px' height="40px" onclick="rate(this.id)" onmouseover="change(this.id);" onmouseout="load()" id="rate4">
									  <input type="hidden" id="rate5_hidden" value="5">
									  <img src="images/star1.png" width='40px' height="40px" onclick="rate(this.id)" onmouseover="change(this.id);" onmouseout="load()" id="rate5">
								  <input type="hidden" name="rating" id="rating" value="0"></td></tr>
									
						</table></p>
								  </div>

							</center>
							<p><iframe title="YouTube video player" class="youtube-player" type="text/html" 
							width="640" height="390" src="<?php echo $tlink; ?>"
							frameborder="0" allowFullScreen></iframe></p>
						</div>

						
					</div>
						<?php   } } else {
						$error = "Unable to fetch";
						} ?>
					<div class="clearfix"> </div>
				</div>
				
				<div class="top-comment-right">
						<div class="right-comment">
							<br/> <p><table cellpadding="5" cellspacing="5">
								<th><b> RELATED TRACKS </b><br><br></th>
								<?php 
						$query1 = $connection -> prepare("SELECT ttitle,aname FROM artist natural join track natural join album WHERE (albumid=? or aid=?) and tid!=? limit 10");
						$query1->bind_param('sss', $albumid, $aid, $tid);
						$query1->execute();
						$query1->store_result();
						$rows1 = $query1->num_rows;
						if ($rows1 >= 1) {
 							$query1->bind_result($ttitle1,$aname1);
							while ($query1->fetch()) {
					?>
							<tr><td width="70%"> <h5><?php echo $ttitle1; ?> 
								 -  <?php echo $aname1; ?>
								</h5></td>
							<td width="10%"><button type="button" class="btn btn-sm btn-info" onclick="play('<?php echo $tid;?>')"> Play </button></td>
						<td width="20%"><button type="button" class="btn btn-sm btn-warning" onclick="add_playlist('<?php echo $tid;?>')">Add to a Playlist</button></td></tr>
							<div class="clearfix"> </div>
						<?php   } } else {
								$error = "Unable to fetch";
								}?>
								</table><br></p>	

						</div>						
					</div>
					
							<div class="clearfix"> </div>
						
				</div></div>


				</div>
			<!---->
			</div>
			
			
					</div>
				</div>
				
			<div class="clearfix"> </div>
			
		</div>

<!--//content-->
<!--footer-->
<div class="footer">
	<div class="container">
		<h2><a href="index.html">Music Wire</a></h2>
		
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
$query1->close();
$connection -> close(); // Closing Connection
}
?>