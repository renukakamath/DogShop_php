<?php include 'customerheader.php' ?>


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



<center>
	<h1>Fliter Product</h1>
	<form method="post">
	<table class="table" style="width: 500px">
		<tr>
			<th>Search</th>
			<td><input type="text"  class="form-control" required="" name="filter"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="search"></td>
		</tr>
	</table>
	</form>
</center>

<center>
	<!-- <h1>view Product</h1> -->

		<!-- <table class="table" style="width: 500px"> -->
		<!-- 	<tr>
				<th>sino</th>
				<th>Breed</th>
				<th>Gender</th>
				
				<th>Description</th>
				<th>Age</th>
				<th>Item Image</th>
				<th>Rate</th>
				<th>Stock</th>	
			</tr> -->

			<?php 


			if (isset($_POST['search'])) {
				extract($_POST);
				 $q="select * from tbl_item inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id) where (breed_name like '$filter%' or gender_name like '$filter%') and (item_status='Available') ";
			

			}else{

     $q="select * from tbl_item inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id)  WHERE item_status='Available'";
 }
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {
    	?>



    	<div class="product-item">
		<img src="<?php echo $row['item_image']?>" /> 
						
		<div class="product-details">
			<h4>Breed:<?php echo $row['breed_name']?></h4>
						  <h4>Gender:<?php echo $row['gender_name']?></h4>
						 
						  <h4>Age:<?php echo $row['age']?></h4>
						  <h4>Price:<?php echo $row['price']?></h4>
						   <h4>Description:<?php echo $row['description']?></h4>
						<?php 

             if ($row['stock']>0) {
             	?>
             	<h4><a class="btn btn-success" href="customer_addtocart.php?pid=<?php echo $row['item_id'] ?>&amount=<?php echo $row['price'] ?>&stock=<?php echo $row['stock'] ?>&img=<?php echo $row['item_image'] ?>">Cart</a></h4>
             	

            <?php 
             }elseif ($row['stock']<=0) {
            	?>

             <h4><a class="btn btn-success" href="#">Out  Of  Stock</a></h4>
           <?php  
            }

    		 ?>
		 

		</div>
		<style type="text/css">
			

		</style>

	</div>
	<?php 
	 }
?>
	
</div>
    	
	
</center>
<?php include 'footer.php' ?>