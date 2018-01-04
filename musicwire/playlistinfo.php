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
$pid=$_GET['id'];
$uid=$_SESSION['login_id'];
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


$query2 = $connection -> prepare("SELECT * FROM playlist WHERE pid=? and uid=?");
$query2->bind_param('ii', $pid, $uid);
$query2->execute();
$query2->store_result();
$rows2 = $query2->num_rows;
if ($rows2 >= 1) { 
	$val =1;  //user can delete
}
else{
	$val =0;   //user cannot delete
}


$query = $connection -> prepare("SELECT pTitle,pDate FROM playlist WHERE pid=?");
$query->bind_param('i', $pid);
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
function delete_playlist() {
	//alert(track);
   location.href ="deleteplaylist.php?id=<?php echo $pid?>"; 
                return false; 
}
function remove_track(track) {
	//alert(track);
   location.href ="deletetrack.php?pid=<?php echo $pid?>&tid="+track; 
                return false; 
}

</script>

</head>
<body>
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
				<div class="col-md-9">
					<div class="blog-grid">
					<div class="lone-line">
						<h4>Playlist Details</h4>
					
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
 							$query->bind_result($pTitle,$pDate);
							while ($query->fetch()) { ?>
					<div class="top-comment-right">
						<div class="right-comment">
							<h5> <?php echo $pTitle; ?></h5>
							<?php if($val==1) {
							 ?>
							<center><button type="button" class="btn btn-sm btn-warning" onclick="delete_playlist()">Delete Playlist</button></center>

							<?php }?>
							<div class="clearfix"> </div>
							<br><table cellpadding="5" cellspacing="5"><tr><td width="45%">Date Created: </td><td><?php echo $pDate; ?></td></tr></table>
						</div>						
					</div>
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
					<div class="top-comment-right">
						<div class="right-comment">
							<br/> <p><table cellpadding="5" cellspacing="5">
								<th> <b> LIST OF TRACKS </b><br><br></th>
					<?php 
						$query = $connection -> prepare("SELECT tid, ttitle,aname, aid FROM artist natural join track natural join playlist_track WHERE pid=?");
						$query->bind_param('i', $pid);
						$query->execute();
						$query->store_result();
						$rows = $query->num_rows;
						if ($rows >= 1) {
 							$query->bind_result($tid,$ttitle, $aname, $aid);
							while ($query->fetch()) {
					?>

							<tr><td width="50%"><b><?php echo $ttitle; ?> </b> 
								- <?php echo $aname; ?> </td>
							<td width="15%"><button type="button" class="btn btn-sm btn-info" onclick="play('<?php echo $tid;?>')"> Play </button></td>
							<?php	if($val==1) {
							 ?>
							<td width="35%"><button type="button" class="btn btn-sm btn-danger" onclick="remove_track('<?php echo $tid;?>')">Remove from Playlist</button></td>
							<?php }
							else {?>
							<td width="35%"><button type="button" class="btn btn-sm btn-warning" onclick="add_playlist('<?php echo $tid;?>')">Add to a Playlist</button></td>
							<?php } ?></tr>

							<?php   } } else {
							$error = "Unable to fetch";
							}?></table>
						</p> 
						</div>						
					</div>
							<div class="clearfix"> </div>
						
				</div>

				<div class="top-comment-right">
						<div class="right-comment">
							<br/><p><table cellpadding="5" cellspacing="5">
								<th>  <b> RELATED PLAYLISTS </b><br><br></th>
					<?php 
						$query1 = $connection -> prepare("SELECT distinct pid,ptitle FROM playlist WHERE uid in (select distinct uid from playlist where pid=?) and pid!=? and plabel='public' limit 10");
						$query1->bind_param('ii', $pid, $pid);
						$query1->execute();
						$query1->store_result();
						$rows1 = $query1->num_rows;
						if ($rows1 >= 1) {

 							$query1->bind_result($pid1,$ptitle1);
							while ($query1->fetch()) {

					?>
							 <tr width="50%"><td><b><a href="playlistinfo.php?id=<?php echo $pid1; ?>"> <?php echo $ptitle1; ?> </a> </b>  </td></tr>
						</div>						
					</div>
							<div class="clearfix"> </div>
						<?php   } } else {
							$error = "Unable to fetch";
							}?></table></p>
				</div></div><br><br>

				
				</div>
			<!---->
			</div>
			
			
					</div>
					</div>
				</div>
				
			<div class="clearfix"> </div>
			
		</div>
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
</body>
</html>

<?php


$query->close();
$query1->close();
$connection -> close(); // Closing Connection
}
?>