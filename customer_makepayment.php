<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);

if (isset($_POST['payment'])) {
	extract($_POST);


	echo $exp_date=$date;
	echo $cd=date("Y-m");

if ($exp_date < $cd) {


alert('expired'); 
			

}else{


$q="insert into tbl_payment values(null,'$id','$oid',curdate())";
insert($q);
$q2="update tbl_cartmaster set status='Payed' where cart_master_id='$cmid'";
update($q2);


$q4="select * from tbl_cartchild where cart_master_id='$cmid'";
$res=select($q4);
foreach ($res as $key) {

 echo $pid= $key['item_id'] ;

echo $qty=$key['qty'];

echo$q3="update tbl_item set stock=stock-'$qty' where item_id='$pid'";
update($q3);


alert('successfully');
return redirect('customer_myorders.php');
}
}
}
 ?>


 <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">


			<h3 class="agileits-title two">Make Payment</h3>
<center>
<h1></h1>
<form method="post">

	<table class="table" style="width:500px">
		<tr>
			<th>Card Details</th>
			<td>
				<select name="id" class="form-control" required="">
					<option>--Select--</option>
					<?php 
                     
                    $r="select *,concat (card_no,' , ',bank_name,' , ',card_type) as card from tbl_card";
                    $re=select($r);
                    foreach ($re as $key ) {?>
                    <option value="<?php echo $key['card_id'] ?>"><?php echo $key['card'] ?></option>	
                  <?php 
                   }



					 ?>
				</select>
			</td>
	

	
			<td><a class="btn btn-success" href="customer_addcard.php">Add Card</a></td>
	
			</tr>
		<tr>
			<th>Amount</th>
			<td><input type="text" required="" value="<?php echo $amo ?>" class="form-control" name="bname"></td>
		</tr>
		<tr>
			<th>C V V</th>
			<td><input type="text" title="Enter 3 Digits" required="" pattern="[0-9]{3}" class="form-control" name="type"></td>
		</tr>
		

		<tr>
			<th>Expired Date</th>
			<td><input type="month" required="" class="form-control" name="date"></td>
		</tr>
	
		
		<tr>
		<td align="center" colspan="2"><input type="submit" name="payment" value="submit" class="btn btn-success"></td>
		</tr>
	</table>

</form>
</center>
</div></div>

<?php include 'footer.php' ?>