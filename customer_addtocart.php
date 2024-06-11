<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);


if (isset($_POST['add'])) {
	extract($_POST);

	echo$data=$quantity;
	echo$stock=$stock;

	if ($stock < $quantity ) {

		alert('Enter Less Quantity');
	}
else{

	$q2="select * from tbl_cartmaster where cust_id='$cid' and status='pending'";
	$res=select($q2);
	if (sizeof($res)>0) {
		$cmid=$res[0]['cart_master_id'];
	}else{

	$q="insert into tbl_cartmaster values(null,'$cid','pending','$total')";
	$cmid=insert($q);

	$q1="insert into tbl_order values(null,'$cmid',curdate())";
	insert($q1);

	$q3="insert into tbl_cartchild values(null,'$cmid','$pid','$quantity','$total')";
	insert($q3);


	alert('successfuly');
	return redirect('customer_buy.php');
}
  $q4="select * from tbl_cartchild where item_id='$pid' and cart_master_id='$cmid' ";
  $res2=select($q4);

  if (sizeof($res2)>0) {
  	$cdid=$res2[0]['cart_child_id'];

  	$q5="update tbl_cartchild set qty=qty+'$quantity', total_price=total_price+'$total' where cart_child_id='$cdid' ";
  	update($q5);
  	
  }else{

	$q3="insert into tbl_cartchild values(null,'$cmid','$pid','$quantity','$total')";
	insert($q3);
	}

	$q6="update tbl_cartmaster set total_amount=total_amount+'$total' where cart_master_id='$cmid' ";
	update($q6);
	alert('successfuly');
	return redirect('customer_buy.php');

}
}

 ?>



<style>
	* {
		box-sizing: border-box;
		margin: 0;
		padding: 0;
	}
	body {
		height: 100%;
		width: 100vw;
		overflow-x: hidden;
	}
	.product-container {
		width: 70%;
		margin: 20px auto;

	}
	.product-item {
		width: 100%;
		padding: 20px;
		/*border-radius: 10px;*/
		font-family: arial;
		/*box-shadow: 0px 5px 10px 5px rgba(0,0,0,0.25);*/
		border-bottom: 2px solid grey;
		display: flex;
		height: 280px;
		margin-bottom: 20px;
	}
	.product-details {
		padding: 20px;
		display: flex;
		width: 100%;
		flex-direction: column;
		justify-content: space-evenly;
	}
	.product-item img {
		margin-right: 20px;
		width: 300px;
		border-radius: 5px;
		object-fit:cover;
	}
	.btn1{
		padding: 5px 10px;
		background: tomato;
		color: white;
		text-decoration: none;
		border-radius: 5px;
	}			
	form {
		margin-bottom: 25px;
		width: 100%;
		display: flex;
		justify-content: center;
	}	
	input[type="text"] {
		width: 60%;
		padding: 5px 10px;
		border-radius: 5px;
		margin-right: 30px;
	}

	input[type="submit"] {
		padding: 5px 10px;
		background: tomato;
		color: white;
		text-decoration: none;
		border-radius: 5px;
	}
</style>


<script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		document.getElementById("t_amount").value = x * y;
	}

</script> 

<h1 align="center">Add To Cart</h1>
<div class="product-container">
	<form method="post">


	<!-- <input type="text" name="q" >
	<input type="submit" value="Search"> -->
	
	
	<div class="product-item">
		<img src="<?php echo $img ?>" /> 
						
		<div class="product-details">
			<h4>Amount:<input type="number" required=""  value="<?php echo $amount ?>"  id="p_amount" name="amo"></h4>
						  <h4>Quantity:<input type="number" required="" id="p_qnty" onchange="TextOnTextChange()"  name="quantity"></h4>
						  <h4>Total:<input type="number" required=""  id="t_amount" name="total"></h4>
						 
						 <h4><input type="submit" name="add" value="submit" ></h4>
						 

		</div>
		<style type="text/css">
			

		</style>

	</div>

</form>
	
</div>
</h4></div></div></form></div></center>

<!-- <center>
<h1>Add To Cart</h1>
<form method="post" >
	<table class="table" style="width:500px">

		<tr>
			<th>Amount</th>
			<td><input type="number" required=""  value="<?php echo $amount ?>"  id="p_amount" name="amo"></td>
		</tr>

		<tr>
			<th>Quantity</th>
			<td><input type="number" required="" id="p_qnty" onchange="TextOnTextChange()"  name="quantity"></td>
		</tr>

		<tr>
			<th>Total</th>
			<td></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="add" value="submit" class="btn btn-success"></td>
	</table>
</form>
</center>
-->
<?php include 'footer.php' ?>