<?php include 'adminheader.php';


if (isset($_POST['product'])) {
	extract($_POST);
    

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 	
	echo$q1="insert into tbl_item values(null,'$gender','$breed','$dis','$target','$age','$rate','$stock','Available') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_manageproduct.php');
 }
		else
		{
			echo "file uploading error occured";
		}


}
if (isset($_GET['nid'])) {
	extract($_GET);

	$q="update tbl_item set item_status='Not Available' where item_id='$nid'";
	update($q);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_item set item_status='Available' where item_id='$aid'";
	update($q);
}

if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_item inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id) where item_id='$uid'";
 	$res1=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		

 	echo$q="update tbl_item set gender_id='$gender',breed_id='$breed',description='$dis',item_image='$target',age='$age',price='$rate',stock='$stock' where item_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_manageproduct.php');

 }
  else
		{
			echo "file uploading error occured";
		}


}




 ?>
 <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">Manage Product</h3>
<center>
<h1></h1>
<form method="post" enctype="multipart/form-data">
	<?php if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Gender</th>
			<td><select name="gender" class="form-control">
				<option value="<?php echo $res1[0]['gender_id'] ?>"><?php echo $res1[0]['gender_name'] ?></option>

				<option>Select</option>
				<?php 

				$q="select * from tbl_gender ";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['gender_id'] ?>"><?php echo $row['gender_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Breed</th>
			<td><select name="breed" class="form-control">

				<option value="<?php echo $res1[0]['breed_id'] ?>"><?php echo $res1[0]['breed_name'] ?></option>
				<option>Select</option>
				<?php 

				$q="select * from tbl_breed where breed_status='Active'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['breed_id'] ?>"><?php echo $row['breed_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control"><?php echo $res1[0]['description'] ?></textarea></td>
		</tr>
		
		
		<tr>
			<th>Item Image</th>
			<td><input type="file" required="" class="form-control" value="<?php echo $res1[0]['item_image'] ?>" name="imgg"></td>
		</tr>

		<tr>
			<th>Age</th>
			<td><input type="number" required="" class="form-control" value="<?php echo $res1[0]['age'] ?>" name="age"></td>
		</tr>
		
		<tr>
			<th>Price</th>
			<td><input type="number" required="" class="form-control" value="<?php echo $res1[0]['price'] ?>" name="rate"></td>
		</tr>
		<tr>
			<th>Stock</th>
			<td><input type="number" required="" class="form-control" value="<?php echo $res1[0]['stock'] ?>" name="stock"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Gender</th>
			<td><select name="gender" class="form-control">
				

				<option>Select</option>
				<?php 

				$q="select * from tbl_gender";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['gender_id'] ?>"><?php echo $row['gender_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Breed</th>
			<td><select name="breed" class="form-control">

				
				<option>Select</option>
				<?php 

				$q="select * from tbl_breed where breed_status='Active'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['breed_id'] ?>"><?php echo $row['breed_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control"></textarea></td>
		</tr>
		
		
		<tr>
			<th>Item Image</th>
			<td><input type="file" required="" class="form-control" name="imgg"></td>
		</tr>

		<tr>
			<th>Age</th>
			<td><input type="number" required="" class="form-control"  name="age"></td>
		</tr>
		
		<tr>
			<th>Price</th>
			<td><input type="number" required="" class="form-control"  name="rate"></td>
		</tr>
		<tr>
			<th>Stock</th>
			<td><input type="number" required="" class="form-control" name="stock"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="product" value="submit" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
</div></div>
<center>
	<h1>view Product</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
				<th>Gender</th>
				<th>Breed</th>
			
			<th>Description</th>
				
				<th>Item Image</th>
				<th>Age</th>
				<th>Price</th>
				<th>Stock</th>
				<th>Status</th>	
			</tr>
			<?php 

     $q="select * from tbl_item inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['gender_name'] ?></td>
    		<td><?php echo $row['breed_name'] ?></td>
    		<td><?php echo $row['description'] ?></td>
    	    <td><img src="<?php echo $row['item_image'] ?>" height="100" width="100"></td>
    		<td><?php echo $row['age'] ?></td>
    		
    		<td><?php echo $row['price'] ?></td>
    		<td><?php echo $row['stock'] ?></td>
    		<td><?php echo $row['item_status'] ?></td>
    		<?php 

              if ($row['item_status']=="Available") {?>
              
              	<td><a class="btn btn-success" href="?nid=<?php echo $row['item_id'] ?>">Not Available</a></td>
         <?php }elseif ($row['item_status']=="Not Available") {?>
         	<td><a class="btn btn-success" href="?aid=<?php echo $row['item_id'] ?>"> Available</a></td>
        <?php }
    		 ?>
    		 	<td><a class="btn btn-success" href="?uid=<?php echo $row['item_id'] ?>">update</a></td>
    		 	<td><a class="btn btn-success"  href="admin_managepurchase.php?item=<?php echo $row['item_id'] ?>&amo=<?php echo $row['price'] ?>">Manage Purchase</a></td>
    		 	<h4><a class="btn btn-success" href="admin_addvaccination.php?pid=<?php echo $row['item_id'] ?>">Add Vaccination</a></h4>

    		
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>