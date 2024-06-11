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

$q="select * from tbl_card where card_no='$num'";
$res=select($q);

if (sizeof($res)>0) {
	alert('Card Number already exist');
}else{





$q1="insert into tbl_card values(null,'$cid','$num','$bname','$type','$date','Active')";
$id=insert($q1);

alert('successfully');
return redirect('customer_buy.php');
}
}
}
 ?>
 <!-- /services -->
	<div class="agile_secives " id="services">
		<div class="container">
			<h3 class="agileits-title two">Add Card</h3>
<center>
<h1></h1>
<form method="post">

	<table class="table" style="width:500px">
		<tr>
			<th>Card Number</th>
			<td><input type="text" required="" title="Enter 16 Digits" pattern="[0-9]{16}"  class="form-control" name="num"></td>
		</tr>
		
		<tr>
			<th> Bank Name</th>
			<td><input type="text" required="" class="form-control" name="bname"></td>
		</tr>
		<tr>
			<th> Card Type</th>
			<td><input type="text" required="" class="form-control" name="type"></td>
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