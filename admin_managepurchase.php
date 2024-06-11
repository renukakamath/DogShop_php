<?php include 'adminheader.php';
extract($_GET);


if (isset($_POST['purchase'])) {
	extract($_POST);
    
	 	
	echo$q1="insert into tbl_purchase_master values(null,'$vendor','$cid','$total',curdate()) ";
   $id=insert($q1);
   echo$q1="insert into tbl_purchase_child values(null,'$id','$item','$quantity','$cost') ";
   insert($q1);
   $q3="update tbl_item set stock=stock+'$quantity' where item_id='$item'";
   update($q3);
   alert('sucessfully');
   return redirect("admin_managepurchase.php?amo=$amo&item=$item");
 }
	


 ?>


 <script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		document.getElementById("t_amount").value = x * y;
	}

</script> 
 <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">Manage Purchase</h3>
<center>
<h1></h1>
<form method="post" >
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Vendor</th>
			<td><select name="vendor" class="form-control">
				<option>Select</option>
				<?php 

				$q="select * from tbl_vendor where vendor_status='Active'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['vendor_id'] ?>"><?php echo $row['vendor_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
	
		<tr>
			<th>Cost Price</th>
			<td><input type="number" required="" id="p_amount" value="<?php echo $amo ?>"  class="form-control" name="cost"></td>
		</tr>
		
		
		<tr>
			<th>Quantity</th>
			<td><input type="number" required="" class="form-control" id="p_qnty" onchange="TextOnTextChange()" name="quantity"></td>
		</tr>

		<tr>
			<th>Total</th>
			<td><input type="number" required="" class="form-control" id="t_amount" name="total"></td>
		</tr>

		

		<td align="center" colspan="2"><input type="submit" name="purchase" value="submit" class="btn btn-success"></td>
	</table>
</form>
</center>
</div></div>
<center>
	<h1>view Purchase</h1>
	<form>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>sino</th>
				<th>Vendor</th>
				<th>Breed</th>
				<th>gender</th>
				<th>Cost Price</th>
				<th>Quantaty</th>
				<th>Date</th>
				
				


				
			</tr>
			<?php 

     $q="select * from tbl_purchase_child inner join tbl_purchase_master using (pur_master_id) inner join tbl_vendor using (vendor_id) inner join tbl_item using (item_id) inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id) where item_id='$item' and tbl_purchase_master.staff_id='$cid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {
    	?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['vendor_name'] ?></td>
    		<td><?php echo $row['breed_name'] ?></td>
    		<td><?php echo $row['gender_name'] ?></td>
    		
    		<td><?php echo $row['cost_price'] ?></td>
    		<td><?php echo $row['quantity'] ?></td>
    		
    		<td><?php echo $row['date'] ?></td>
    		
    		

    	
    		
    		<!-- <td><a href="?did=<?php echo $row['member_id'] ?>">delete</a></td>
    		<td><a href="?uid=<?php echo $row['member_id'] ?>">update</a></td> -->
    	</tr>
    <?php
     }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>