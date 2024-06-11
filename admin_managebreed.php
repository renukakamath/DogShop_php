<?php include 'adminheader.php';

if (isset($_POST['Breed'])) {
	extract($_POST);
    
  echo$q1="insert into tbl_breed values(null,'$fname','Active') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managebreed.php');
 }

if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_breed set breed_status='InActive' where breed_id='$iid'";
	update($q);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_breed set breed_status='Active' where breed_id='$aid'";
	update($q);
}
 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_breed where breed_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_breed set breed_name='$fname' where breed_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managebreed.php');

 }



 ?>


 <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">Manage Breed</h3>
			
<center>
<h1></h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Breed Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['breed_name'] ?>" name="fname"></td>
		</tr>
		
		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Breed Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
		</tr>
		
		<td align="center" colspan="2"><input type="submit" name="Breed" value="submit" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
</div></div>
<center>
	<h1>view Breeds</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>Breed Name</th>
				<th>Status </th>
				
			</tr>
			<?php 

     $q="select * from tbl_breed  ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {
    	?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['breed_name'] ?></td>
    		<td><?php echo $row['breed_status'] ?></td>
    	

    		<?php if ($row['breed_status']=="Active") {
    			?>

            <td><a class="btn btn-success" href="?iid=<?php echo $row['breed_id'] ?>">InActive</a></td>
           

    		<?php 
    		}elseif ($row['breed_status']=="InActive") {
    			?>
    			<td><a class="btn btn-success" href="?aid=<?php echo $row['breed_id'] ?>">Active</a></td>
    		<?php 
    		} ?>
    		   <td><a class="btn btn-success" href="?uid=<?php echo $row['breed_id'] ?>">Update</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>