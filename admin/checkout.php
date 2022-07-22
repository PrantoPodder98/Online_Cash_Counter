
<?php
	require 'db_config.php';

	
	$grand_total = 0;
	$grand_total_costing=0;
	$alltimes= '';
	$items =array();

	$sql= "Select CONCAT(product_name, '(',quantity,')','-BDT ',selling_total_price) as ItemQty, cost_total_price, selling_total_price from cart";

	$sql= $db->prepare($sql);
	$sql->execute();
	$result= $sql->get_result();
	while ($row= $result->fetch_assoc()) {
		$grand_total +=$row['selling_total_price'];
		$grand_total_costing +=$row['cost_total_price'];
		$items[]= $row['ItemQty'];
	}

	$allItems= implode(", ", $items);

	
?>


<?php require 'd_header.php' ?>

<!-- ########## START: LEFT PANEL ########## -->
<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

    

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.php">Online Cash Counter</a>
      <span class="breadcrumb-item active">Checkout</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
    	<div class="container">

			<div class="row justify-content-center" >
				<div class="col-lg-6 px-4 m-2 pb-4" id="order" style="background-color: #F9F9F9;border: 2px solid black;border-radius: 15px;">

					<h4 class="text-center text-info p-2 mt-4">Complete your order!</h4>
					<div class="jumbotron p-3 mb-2 text-center">
						<h6 class="lead"><b>Products : </b><?= $allItems; ?></h6>
						
						<h5><b>Amount Payable : </b>BDT <?= number_format($grand_total) ?></h5>
						
					</div>
				<form action="" method="post" id="placeOrder">
					<input type="hidden" name="products" value="<?= $allItems; ?>">
					<input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
					<input type="hidden" name="grand_total_costing" value="<?= $grand_total_costing; ?>">


						<div class="form-group">	
							<label style="font-weight: 700;font-size: 18px;">Name: </label>					
							<input type="text" name="name" class="form-control" placeholder="Enter Name" required>						
						</div>

						<div class="form-group">
							<label style="font-weight: 700;font-size: 18px;">Contact: </label>							
							<input type="tel" name="phone" class="form-control" placeholder="Enter Phone No."  required>						
						</div>

						<div class="form-group">	
							<label style="font-weight: 700;font-size: 18px;">Address: </label>						
							<input name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here...."  required>
						</div>

						<h6 class="text-center lead">Select Payment Mode</h6>
						<div class="form-group">
							<select name="pmode" class="form-control" required>
								<option value="" selected disabled>-Select Payment Mode-</option>
								<option value="cash">Cash</option>
								<option value="bkash">Bkash</option>

							</select>
						</div>

						<div class="form-group">
							<input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
						</div>
						
					</form>
					
				</div>
				
			</div>
			
		</div>
      

      
    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->


  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$("#placeOrder").submit(function(e){
			e.preventDefault();
			$.ajax({
				url: 'action.php',
				method: 'post',
				data: $('form').serialize()+"&action=order",
				success: function(response){
					$("#order").html(response);
				}

			});
		});
	});


</script>
<?php require 'd_javascript.php' ?>
  </body>
</html>


