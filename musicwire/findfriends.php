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
<!--flexslider-->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!--//flexslider-->
</head>
<body>
	<form name="searchusers">
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
						<h4>Search and follow friends<br></h4>
							<div class="clearfix"> </div>
						<div class="top-comment-right">
					   <div class="search">
					      <input type="text" name="keyword" class="searchTerm" placeholder="Search users">
					      <button type="submit" class="searchButton" onclick="location.href='findfriends.php?keyword='+ document.getElementById('keyword').value;">
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
					<?php 
						$query = $connection -> prepare("SELECT uid, firstName, lastName FROM users WHERE username like ?");
						$query->bind_param('s', $keyword);
						$query->execute();
						$query->store_result();
						$rows = $query->num_rows;
						if ($rows >= 1) {
 							$query->bind_result($uid,$fname,$lname);
							while ($query->fetch()) {
					?>

					<div class="top-comment-right">
						<div class="right-comment">
							<p> <b> <a href="userinfo.php?id=<?php echo $uid; ?>"> <?php echo $fname . ' ' . $lname; ?> </a> </b>  </p> 
						</div>						
					</div>
							<div class="clearfix"> </div>
						<?php   } } else { ?>
						<div class="top-comment-right">
						<div class="right-comment">
							<p> No results found  </p> 
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
</form>
</body>
</html>

<?php


$query->close();
$connection -> close(); // Closing Connection
}
?>