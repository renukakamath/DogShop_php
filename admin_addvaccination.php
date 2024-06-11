<?php include 'adminheader.php';
extract($_GET);


if (isset($_POST['vaccination'])) {
	extract($_POST);


echo $exp_date=$date;
	echo $cd=date("Y-m-d");

if ($exp_date < $cd) {


alert('No Vaccination'); 
			

}else{
    
	 	
	echo$q1="insert into tbl_vaccination values(null,'$breed','$type','$date','$dose') ";
      insert($q1);
 
   alert('sucessfully');
   return redirect("admin_addvaccination.php");
 }
	}


 ?>
 <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">Add Vaccination</h3>
			
<center>
<h1></h1>
<form method="post" >
	<table class="table" style="width:500px">
		<tr>
			<th>Breed</th>
			<td><select name="breed" class="form-control">
				<option>Select</option>
				<?php 

				$q="select * ,concat (tbl_breed.breed_name) as breedname ,concat (tbl_gender.gender_name) as gendername from tbl_item inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id) where item_status='Available'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['item_id'] ?>"><?php echo $row['breedname'] ?>&<?php echo $row['gendername'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
	
		<tr>
			<th>Vaccination Type</th>
			<td><input type="text" class="form-control" required="" name="type"></td>
		</tr>
		
		
		<tr>
			<th>Vaccination Date</th>
			<td><input type="date" class="form-control" required="" name="date"></td>
		</tr>

		<tr>
			<th>Vaccination Dose</th>
			<td><input type="number" required="" class="form-control"  name="dose"></td>
		</tr>

		

		<td align="center" colspan="2"><input type="submit" name="vaccination" value="submit" class="btn btn-success"></td>
	</table>
</form>
</center>
</div></div>
<center>
	<h1>view Vaccination</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
				
				<th>Breed</th>
				<th>gender</th>
				<th>Vaccination Type</th>
				<th>Vaccination Date</th>
				<th>Vaccination Dose</th>
		
			</tr>
			<?php 

     $q="select * from tbl_vaccination inner join tbl_item using (item_id) inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    	
    		<td><?php echo $row['breed_name'] ?></td>
    		<td><?php echo $row['gender_name'] ?></td>
    		
    		<td><?php echo $row['vacc_type'] ?></td>
    		<td><?php echo $row['vacc_date'] ?></td>
    		
    		<td><?php echo $row['vacc_dose'] ?></td>
    		
    		

    	
    		
    		<!-- <td><a href="?did=<?php echo $row['member_id'] ?>">delete</a></td>
    		<td><a href="?uid=<?php echo $row['member_id'] ?>">update</a></td> -->
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>