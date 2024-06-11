<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);

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


<h1 align="center">view MyOrders</h1>
<div class="product-container">
  <form>
 <!--  <input type="text" name="q" >
  <input type="submit" value="Search"> -->
  </form>

<!-- <center>
	<h1>view Orders</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			    <th>Price</th>
                <th>Quantity</th>
                <th>Gender</th>
              <th>Breed</th>
      
           <th>Description</th>
        
            <th>Item Image</th>
             <th>Age</th>
              <th>Date</th>
               <th>Status</th>
				 -->
		<!-- 	</tr> -->
			<?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`) INNER JOIN tbl_cartchild USING (cart_master_id)INNER JOIN `tbl_item`USING (item_id) inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id) where cust_id='$cid' group by (order_id)";
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
              
               <h4>Description:<?php echo $row['description']?></h4>
               <h4>Quantity:<?php echo $row['qty'] ?></h4>
               <h4>Order Date:<?php echo $row['o_date'] ?></h4>
               <h4>Total Amount:<?php echo $row['total_price'] ?></h4>
               <h4>Status:<?php echo $row['status'] ?></h4>

                <?php 

                            if ($row['status']=="Payed") {
                              ?>

                                <h4><a  class="btn btn-success"href="customer_viewpayment.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>&amo=<?php echo $row['total_amount'] ?>">View Payment</a>
                                   <a  class="btn btn-success"href="customer_viewvaccination.php?item=<?php echo $row ['item_id'] ?>">View Vaccination</a></h4>

                             
                          <?php   }

                            ?>
             

    </div>
    <style type="text/css">
      

    </style>

  </div>
  <?php 
   }
?>
  
</div>

<?php include 'footer.php' ?>