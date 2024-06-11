<?php include 'connection.php';


if (isset($_POST['cusreg'])) {
	extract($_POST);
	$q1="select * from tbl_login where username='$uname' and password='$pwd'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{
    $q="insert into tbl_login values('$uname','$pwd','Customer','Active')";
     insert($q);
  $q1="insert into tbl_customer values(null,'$uname','$fname','$lname','$num','$add','$street','$district','$pin','$date') ";
   insert($q1);
   alert('sucessfully');
   return redirect('customer_registration.php');
}
}


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pets Care an Animals Category Bootstrap Responsive website Template | Gallery :: w3layouts</title>
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
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- font-awesome icons -->
	<!-- //Custom Theme files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
	    rel='stylesheet' type='text/css'>
	<!-- //web-fonts -->
</head>

<body>
	<!-- banner -->
	<div class="agileits-banner about-w3banner">
		<div class="bnr-agileinfo">
			<div class="banner-top w3layouts">
				<div class="container">
					<ul class="agile_top_section">
						<li>
							<p> Pets Care Website !</p>
						</li>
						<li>
							<p><span class="glyphicon glyphicon-earphone"></span> +11 999 8888 7777 </p>
						</li>
						<li><a class="sign" href="login.php" data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-in" aria-hidden="true"></i>  Login</a>							</li>
					</ul>
				</div>
			</div>
			<div class="banner-w3text w3layouts">

				<!-- <h2>Pets Care</h2> -->
			</div>
			<!-- navigation -->
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
							<li><a href="home.php" class="active">Home</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="gallery.html">Gallery</a></li>
								
								
							</ul>
						</div>
						<!-- <div class="w3ls-bnr-icons social-icon navbar-right">
							<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a>
							<a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a>
						</div> -->
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //navigation -->
		</div>
	</div>
	<!-- //banner -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<div class="signin-form profile">
						<h3 class="agileinfo_sign">Sign In</h3>
						<div class="login-form">
							<form action="#" method="post">
								<input type="email" name="email" placeholder="E-mail" required="">
								<input type="password" name="password" placeholder="Password" required="">
								<div class="tp">
									<input type="submit" value="Sign In">
								</div>
							</form>
						</div>
						<div class="login-social-grids">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
						<p><a href="#" data-toggle="modal" data-target="#myModal3"> Don't have an account?</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->

 <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">Customer Registration</h3>
			
					
							
<center>
<h3></h3>
<form method="post">
	<table class="table" style="width:500px">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" name="lname"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>Address</th>
			<td><textarea name="add" required="" class="form-control"></textarea></td>
		</tr>
		
		<tr>
			<th>Street</th>
			<td><input type="text" required="" class="form-control" name="street"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" name="district"></td>
		</tr>
		
		
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" name="pin"></td>
		</tr>
		
		<tr>
			<th>Date</th>
			<td><input type="date" required=""  class="form-control" name="date" ></td>
		</tr>

		
		<tr>
			<th>User Name</th>
			<td><input type="email" required="" class="form-control"  name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="cusreg" value="submit" class="btn btn-success"></td>
	</table>
</form>
</center>
					
						
				
		</div>
	</div>
	<!-- //services -->

<?php include 'footer.php' ?>