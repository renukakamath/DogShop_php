<?php include 'publicheader.php';


if (isset($_POST['login'])) {
	extract($_POST);

	$q="select * from tbl_login where username='$uname' and password='$pwd'";
	$res=select($q);
	if (sizeof($res)>0) {

           $_SESSION['username']=$res[0]['username'];
           $lid=$_SESSION['username'];

 	     $_SESSION['user_type']=$res[0]['user_type'];
 	     $user_type=$_SESSION['user_type'];

		if ($res[0]['user_type']=="admin") {

			return redirect('admin_home.php');
		}elseif ($res[0]['user_type']=="Customer") {

			$q1="select * from tbl_login where username='$uname' and status='InActive'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('Inactive');
 		}else{


 			$q2="select * from tbl_customer inner join tbl_login using (username) where username='$lid'";
 			$res2=select($q2);
 			if (sizeof($res2)>0) {
 				 $_SESSION['cust_id']=$res2[0]['cust_id'];
                     $cid=$_SESSION['cust_id'];
           return redirect('customer_home.php');


 			}
			
		}

		}elseif ($res[0]['user_type']=="Staff") {


       $q1="select * from tbl_login where username='$uname' and status='InActive'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('Inactive');
 		}else{



		 $q="select * from tbl_staff inner join tbl_login using (username) where username='$lid'";
		 $res=select($q);
		 if (sizeof($res)>0) {
		 		$_SESSION['staff_id']=$res[0]['staff_id'];
			$cid=$_SESSION['staff_id'];
			return redirect('admin_home.php');
		}
		 }		
		}
	}else{
		alert('invalid username and password');
	}

}



 ?>



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
							<form method="post">
								<input type="email" name="uname" placeholder="E-mail" required="">
								<input type="password" name="pwd" placeholder="Password" required="">
								<div class="tp">
									<input type="submit"  name="login" value="Sign In">

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
						<!-- <p><a href="customer_registration.php" data-toggle="modal" data-target="myModal3"> Don't have an account?</a></p> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->
<!-- <center>
<h1>Login</h1>
<form method="post">
	<table class="table" style="width:500px">
		
		<tr>
			<th>User Name</th>
			<td><input type="email" required="" class="form-control"  name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="login" value="submit" class="btn btn-success"></td>
	</table>
</form>
</center> -->
<?php include 'footer.php' ?>