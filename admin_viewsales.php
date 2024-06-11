<?php include 'adminheader.php';
extract($_GET);



 ?>
 <!-- /services -->
  <div class="agile_secives " id="services">
    <div class="container">
      <h3 class="agileits-title two">view Sales</h3>

<center>
	<h1></h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>Date</th>
				<th>Total Amount</th>
				
			    <th>Gender</th>
                <th>Breed</th>
				<th>Quantity</th>
                <th>Status</th>

			</tr>
			<?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id)inner join tbl_item using (item_id) inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['o_date'] ?></td>
    		<td><?php echo $row['total_amount'] ?></td>
    		
    		<td><?php echo $row['gender_name'] ?></td>
            <td><?php echo $row['breed_name'] ?></td>
    		<td><?php echo $row['qty'] ?></td>
    	
    		<td><?php echo $row['status'] ?></td>
            <td><a class="btn btn-success" href="admin_viewpayment.php?oid=<?php echo $row['order_id'] ?>">View Payment</a></td>

          <!--   <?php 
            if ($row['status']=="Payed") {
                ?>
                <td><a class="btn btn-success" href="admin_assigncourier.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>">Asssign To Courier</a></td>
           <?php  }


             ?>
            -->
    		
           
    		

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
 </div></div>
<?php include 'footer.php' ?>