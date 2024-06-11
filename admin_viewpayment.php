<?php include 'adminheader.php';
extract($_GET);



 ?>
  <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">view Payment</h3>

<center>
	<h1></h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>Card Number</th>
				
				<th>Customer</th>
			     <th>Order Date</th>
				
				
			</tr>
			<?php 

     $q="SELECT * FROM `tbl_payment` INNER JOIN `tbl_card` USING (`card_id`) INNER JOIN `tbl_order` USING (`order_id`) inner join tbl_customer using (cust_id) where order_id='$oid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['card_no'] ?></td>
    		<td><?php echo $row['cust_fname'] ?></td>
         
    		
    		<td><?php echo $row['o_date'] ?></td>
    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
</div></div>
<?php include 'footer.php' ?>