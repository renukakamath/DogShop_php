<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);

 ?>

 <!-- /services -->
    <div class="agile_secives " id="services">
        <div class="container">
            <h3 class="agileits-title two">view Orders</h3>
<center>
	<h1></h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			  
				<th>Total Amount</th>
				
			 
                <th>Status</th>
				
			</tr>
			<?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`) INNER JOIN tbl_cartchild USING (cart_master_id)INNER JOIN `tbl_item`USING (item_id) where cust_id='$cid' group by (order_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    
    		<td><?php echo $row['total_amount'] ?></td>
    	
    	
    		<td><?php echo $row['status'] ?></td>

    		<td><a class="btn btn-success" href="customer_buy.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>">Order Details</a></td>

    		<?php 

               if ($row['status']=="pending") {?>
              <td><a  class="btn btn-success"href="customer_makepayment.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>&amo=<?php echo $row['total_amount'] ?>">Make Payment</a></td>
            
              <?php 
               }

    		 ?>
    
    	</tr>
    	
    <?php }

			 ?>
		</table>
	</form>
</center>
</div></div>
<?php include 'footer.php' ?>