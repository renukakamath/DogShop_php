
<?php include 'connection.php';




$user_type=$_SESSION['user_type'];



extract($_GET);

if ($user_type=="Staff") {

	$cid=$_SESSION['staff_id'];

}else if ($user_type=="admin") {

	$cid="0";
}




?>
<!--  <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 -->


<!-- <a href="admin_managevendor.php">Manage Vendor</a>
<a href="admin_managebreed.php">Manage Breed</a>
<a href="admin_managegender.php">Manage Gender</a>
<a href="admin_manageproduct.php">Manage Product</a>
<a href="admin_viewcustomer.php">View Customer</a>
<a href="admin_viewsales.php">View Sales</a>
<a href="login.php">Logout</a> -->


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pets Care an Animals Category Bootstrap Responsive website Template | Home :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Pets Care Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<!-- easy-responsive-tabs -->

	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- font-awesome icons -->
	<!-- //Custom Theme files -->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Junge" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
	    rel='stylesheet' type='text/css'>
	<!-- //web-fonts -->
</head>

<body>
	<!-- banner -->
	<!-- <div class="agileits-banner" style="height: 100px"> -->
		<!-- <div class="bnr-agileinfo">
			<div class="banner-top w3layouts">
				<div class="container">
					<ul class="agile_top_section">
						<li>
							<p> Pets Care Website !</p>
						</li>
						<li>
							<p><span class="glyphicon glyphicon-earphone"></span> +11 999 8888 7777 </p>
						</li>


						


					</ul>
				</div>
			</div>
			<div class="banner-w3text w3layouts">
				<p class="w3_text">Inspired by w3layouts</p>
				<h3 class="w3ls_agile">Dog Cat Pet Care </h3>

				<h2>Pets Care</h2> -->
			<!-- </div> -->
		<!-- 	 navigation  -->
			<div class="top-nav w3-agiletop">
				<div class="agile_inner_nav_w3ls">
					<div class="navbar-header w3llogo">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a href="index.html">Pets Care</a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="w3menu navbar-left">
							<ul class="nav navbar">
								<li><a href="admin_home.php" class="active">Home</a></li>

<?php 
	if ($user_type=="admin") { ?>

	<li><a href="admin_managestaff.php">Manage Staff</a></li>

<?php  }
 ?>
								
								
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">Manages</span><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="admin_managevendor.php">Vendor</a></li>
										<li><a href="admin_managebreed.php">Breed</a></li>
										<li><a href="admin_managegender.php">Gender</a></li>
										<li><a href="admin_manageproduct.php">Product</a></li>
										<li><a href="admin_addvaccination.php">Add Vaccination</a></li>

									</ul>
								</li>
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">Views</span><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="admin_viewcustomer.php">Customer</a></li>
										<li><a href="admin_viewsales.php">Sales</a></li>
									</ul>
								</li>


								<li><a href="login.php">Logout</a></li>
							</ul>
						</div>
						<div class="w3ls-bnr-icons social-icon navbar-right">
							<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a>
							<a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //navigation -->
		</div>
	</div>
	<!-- //banner -->