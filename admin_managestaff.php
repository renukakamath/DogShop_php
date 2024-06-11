<?php include 'adminheader.php';


if (isset($_POST['staffreg'])) {
	extract($_POST);
	$q1="select * from tbl_login where username='$uname' and password='$pwd'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{
    echo$q="insert into tbl_login values('$uname','$pwd','Staff','Active')";
     insert($q);
  echo$q1="insert into tbl_staff values(null,'$uname','$fname','$lname','$num','$add','$street','$dis','$pin','$date') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managestaff.php');
}
}
if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_login set status='InActive' where username='$iid'";
	update($q);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_login set status='Active' where username='$aid'";
	update($q);
}

 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_staff where staff_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_staff set staff_fname='$fname' ,staff_lname='$lname',staff_phone='$num',staff_hname='$add',staff_street='$street',staff_dist='$district',staff_pin='$pin',staff_date='$date'where staff_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managestaff.php');

 }

 ?>
  <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">Manage Staff</h3>
<center>
<h1></h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_fname'] ?>" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_lname'] ?>" name="lname"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" value="<?php echo $res[0]['staff_phone'] ?>" class="form-control" name="num"></td>
		</tr>
			<tr>
			<th>Address</th>
			<td><textarea name="add" required="" class="form-control"><?php echo $res[0]['staff_hname'] ?></textarea></td>
		</tr>
		<tr>
			<th>Street</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_street'] ?>" name="street"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_dist'] ?>" name="district"></td>
		</tr>
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" value="<?php echo $res[0]['staff_pin'] ?>" name="pin"></td>
		</tr>
		
		<tr>
			<th>Date</th>
			<td><input type="date" required="" class="form-control" value="<?php echo $res[0]['staff_date'] ?>" name="date"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
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
			<td><input type="text" required="" class="form-control" name="dis"></td>
		</tr>
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" name="pin"></td>
		</tr>
		
		<tr>
			<th>Date</th>
			<td><input type="date" required="" class="form-control" name="date"></td>
		</tr>

		<tr>
			<th>User Name</th>
			<td><input type="email" required="" class="form-control"  name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="staffreg" value="submit" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
</div></div>
<center>
	<h1>view Staff</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
			     <th>Street</th>
				<th>District</th>
				<th>Phone</th>
				<th>Pincode</th>

				
				<th>Date</th>
			
			

				
			</tr>
			<?php 

     $q="select * from tbl_staff inner join tbl_login using (username) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['staff_fname'] ?></td>
    		<td><?php echo $row['staff_lname'] ?></td>
    		<td><?php echo $row['staff_hname'] ?></td>
    		<td><?php echo $row['staff_street'] ?></td>
    		<td><?php echo $row['staff_dist'] ?></td>
    	<td><?php echo $row['staff_phone'] ?></td>
    		<td><?php echo $row['staff_pin'] ?></td>
    		<td><?php echo $row['staff_date'] ?></td>
    	

    		<?php if ($row['status']=="Active") {
    			?>

            <td><a class="btn btn-success" href="?iid=<?php echo $row['username'] ?>">InActive</a></td>
           

    		<?php 
    		}elseif ($row['status']=="InActive") {
    			?>
    			<td><a class="btn btn-success" href="?aid=<?php echo $row['username'] ?>">Active</a></td>
    		<?php 
    		} ?>
    		   <td><a class="btn btn-success" href="?uid=<?php echo $row['staff_id'] ?>">Update</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>

<?php include 'footer.php' ?>