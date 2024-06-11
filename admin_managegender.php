<?php include 'adminheader.php';




if (isset($_POST['gender'])) {
	extract($_POST);
    
  echo$q1="insert into tbl_gender values(null,'$fname')";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managegender.php');
 }


 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_gender where gender_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_gender set gender_name='$fname' where gender_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managegender.php');

 }



 ?>
  <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">Manage Gender</h3>
<center>
<h1></h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Gender Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['gender_name'] ?>" name="fname"></td>
		</tr>
		
		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Gender Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
		</tr>
		
		<td align="center" colspan="2"><input type="submit" name="gender" value="submit" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
</div></div>
<center>
	<h1>view Gender</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>Gender Name</th>
			
				
			</tr>
			<?php 

     $q="select * from tbl_gender  ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {
    	?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['gender_name'] ?></td>
    		
    
    		   <td><a class="btn btn-success" href="?uid=<?php echo $row['gender_id'] ?>">Update</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>