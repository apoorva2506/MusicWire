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
<!--script type="text/javascript">
	
	function validate() {
		
		let pwd1 = document.getElementById('pwd1').value;
		alert(pwd1);
		let pwd2 = document.getElementById('pwd2').value;
		alert(pwd2);

		  if(pwd1 == pwd2) { 
		    return true;
		  } else {
		   alert("Passwords don't match.");
		   return false;
		}

	}

</script>-->
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
			<!---->
	</div>
</div>
<!--//header-->
<!--content-->
			<div class="contact">
				<div class="container">
					<div class="contact-top ">
						<h3>Update Details</h3>
					</div>		
		
					<div class="contact-grids">
						<div class="contact-form">
							<form name="myform" action="changepwd1.php" method="post" onsubmit="return validate()">
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<span>Enter New Password :</span>
										<input type="password" class="text" name="pwd1" value="<?php echo($firstname);?>">
									</div>
								</div>

								<div class="clearfix"> </div>
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<span>Enter Password Again :</span>
										<input type="password" class="text" name="pwd2" value="<?php echo($lastname);?>">
									</div>
								</div>
								<div class="clearfix"> </div>
								<input type="submit" value="Change Password">
							</form>
						</div>
						<br><br><br><br><br><br>
				</div>
			</div>
<!--//content-->
<!--footer-->
<div class="footer">
	<div class="container">
		<h2><a href="index.html">Music Club</a></h2>
		
					<ul>
						<li><a href="index.html" >Home  </a> </li>
						<li><a href="album.html" >Albums  </a> </li>
						<li><a href="blog.html"  >Blog</a></li>
						<li><a href="typo.html" >Events </a></li>
						<li><a href="mail.html" >Mail </a></li>
						<div class="clearfix"> </div>
					</ul>
					
	</div>
</div>
<!--//footer-->
</body>
</html>
<?php } ?>