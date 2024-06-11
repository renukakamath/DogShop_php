
<?php include 'adminheader.php';


if (isset($_POST['vendor'])) {
	extract($_POST);
    
  echo$q1="insert into tbl_vendor values(null,'$cid','$fname','$num','$add','$street','$dis','$pin','$date','Active') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managevendor.php');
 }

if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_vendor set vendor_status='InActive' where vendor_id='$iid'";
	update($q);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_vendor set vendor_status='Active' where vendor_id='$aid'";
	update($q);
}



 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_vendor where vendor_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	echo$q="update tbl_vendor set vendor_name='$fname',vendor_phone='$num',vendor_hname='$add',vender_street='$street',vendor_dist='$dis',vendor_pin='$pin',vendor_date='$date' where vendor_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managevendor.php');

 }

 ?>
  <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">Manage Vendor</h3>
<center>
<h1></h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['vendor_name'] ?>" name="fname"></td>
		</tr>
		
		
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" value="<?php echo $res[0]['vendor_phone'] ?>"  name="num"></td>
		</tr>

		<tr>
			<th>Address</th>
			<td><textarea name="add" required="" class="form-control"><?php echo $res[0]['vendor_hname'] ?></textarea></td>
		</tr>
		<tr>
			<th>Street</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['vender_street'] ?>" name="street"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['vendor_dist'] ?>" name="dis"></td>
		</tr>
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" value="<?php echo $res[0]['vendor_pin'] ?>" name="pin"></td>
		</tr>
		
		<tr>
			<th>Date</th>
			<td><input type="date" required="" class="form-control" value="<?php echo $res[0]['vendor_date'] ?>" name="date"></td>
		</tr>
		
		
		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
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
		
		<td align="center" colspan="2"><input type="submit" name="vendor" value="submit" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>

</div></div>
<center>
	<h1>view Vendor</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Street</th>
				<th>District</th>
				<th>Pincode</th>
				<th>Date</th>
				
				
			</tr>
			<?php 

     $q="select * from tbl_vendor where staff_id='$cid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['vendor_name'] ?></td>
    		<td><?php echo $row['vendor_phone'] ?></td>
    		<td><?php echo $row['vendor_hname'] ?></td>
           <td><?php echo $row['vender_street'] ?></td>
    		<td><?php echo $row['vendor_dist'] ?></td>
    		<td><?php echo $row['vendor_pin'] ?></td>
    		<td><?php echo $row['vendor_date'] ?></td>
    		<td><?php echo $row['vendor_status'] ?></td>

    		<?php 

              if ($row['vendor_status']=="Active") {?>
              <td><a class="btn btn-success" href="?iid=<?php echo $row['vendor_id'] ?>">InActive</a></td>
            
             <?php }elseif ($row['vendor_status']=="InActive") {?>
             	<td><a class="btn btn-success" href="?aid=<?php echo $row['vendor_id'] ?>">Active</a></td>
             <?php }?>
      <td><a class="btn btn-success" href="?uid=<?php echo $row['vendor_id'] ?>">Update</a></td>
             
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>