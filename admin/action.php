<?php
	
	session_start();

	require 'db_config.php';
	require 'calculation.php';

	/// Code for product insert
	if(isset($_POST['btn-ProductInsert']))
	{
	

		$product_name=$_POST['product_name'];
		$cost_price=$_POST['cost_price'];
		$selling_price=$_POST['selling_price'];
		$quantity=$_POST['quantity'];
		$company_name=$_POST['company_name'];
		$company_address=$_POST['company_address'];
		$company_email=$_POST['company_email'];
		$unit_type = $_POST['unit_type'];

		if (isset($_FILES["fileToUpload"]["name"])) {
			
			$target_dir = "product_images/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			  
			  $uploadOk = 0;
			  header("Location: buy_products.php?error=imgerror");
			  die();
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
			  } else {
			    echo "Sorry, there was an error uploading your file.";
			  }
			}


		}
		$sql = "INSERT INTO products (product_name, cost_price, selling_price,quantity,company_name,company_address,company_email,unit_type,product_image) VALUES ('$product_name','$cost_price','$selling_price','$quantity','$company_name','$company_address','$company_email','$unit_type','$target_file')";

		$db->query($sql);
		header("Location: buy_products.php?msg=inserted");

	}



	////code for deleting a product using the Product ID
	if(isset($_GET['delete_product_id'])){
		$productId=$_GET['delete_product_id'];

		$sql = "DELETE FROM products WHERE id='$productId';";

		$db->query($sql);

		header("Location: buy_products_list.php?delete=success");

	}



	///code for updating any product using their product Id
	if(isset($_POST['btn-ProductUpdate']))
	{

		$product_id=$_POST['product_id'];
		$product_name=$_POST['product_name'];
		$cost_price=$_POST['cost_price'];
		$selling_price=$_POST['selling_price'];
		$quantity=$_POST['quantity'];
		$company_name=$_POST['company_name'];
		$company_address=$_POST['company_address'];
		$company_email=$_POST['company_email'];
		$unit_type = $_POST['unit_type'];

		// die($product_name);

		$sql = "UPDATE products SET product_name='$product_name', cost_price='$cost_price' , selling_price='$selling_price' ,  quantity ='$quantity' , company_name='$company_name' , company_address='$company_address' , company_email='$company_email' ,  unit_type='$unit_type' WHERE id='$product_id';";

		$db->query($sql);


		if (isset($_FILES["fileToUploads"]["name"])) {
			
			$target_dir = "product_images/";
			$target_file = $target_dir . basename($_FILES["fileToUploads"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			  
			  $uploadOk = 0;
			  header("Location: edit_products.php?edit_product_id=$product_id&error=imgerror");
			  
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			  if (move_uploaded_file($_FILES["fileToUploads"]["tmp_name"], $target_file)) {
			    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUploads"]["name"])). " has been uploaded.";

			    
			    $sql2 = "UPDATE products SET product_image='$target_file' WHERE id='$product_id';";

				$db->query($sql2);



			  } else {
			    echo "Sorry, there was an error uploading your file.";
			  }
			}


		}	

		header("Location: buy_products_list.php?update=success");

	}



	///code for adding products to CART with quantity
	if(isset($_POST['btn-addToCart']))
	{
		$quantity=$_POST['choose_quantity'];

		$product_name=$_POST['product_name'];
		$product_selling_price=$_POST['product_selling_price'];
		$product_cost_price=$_POST['product_cost_price'];
		$product_image=$_POST['product_image'];
		$product_code=$_POST['product_id'];


		$cost_total_price = (int)$quantity * (int)$product_cost_price;
		$selling_total_price = (int)$quantity * (int)$product_selling_price;

		

		//checking if product already exist in the CART or not
		
		$product_count=fetch_all_data_usingDB($db,"select COUNT(*) from cart where product_code = '$product_code'");

		$count_value=$product_count['COUNT(*)'];

		if($count_value>="1")
		{
			header("Location: sell_products_list.php?exist=true");
			die();
		}
		else
		{
			$sql = "INSERT INTO cart (product_name,product_selling_price,product_cost_price,product_image,quantity,cost_total_price,selling_total_price,product_code) VALUES ('$product_name','$product_selling_price','$product_cost_price','$product_image','$quantity','$cost_total_price','$selling_total_price','$product_code')";

			$db->query($sql);
			header("Location: sell_products_list.php?msg=inserted");
		}

		
	}




	//Removing a single product from cart table
	if(isset($_GET['cart_singleproduct_remove']))
	{
		$cart_id=$_GET['cart_singleproduct_remove'];

		$sql = "DELETE FROM cart WHERE id='$cart_id';";

		$db->query($sql);

		header("Location: cart.php?singledelete=success");
	}

	//Removing a single product from cart table
	if(isset($_GET['cart_singleproduct_remove2']))
	{
		$cart_id=$_GET['cart_singleproduct_remove2'];

		$sql = "DELETE FROM cart WHERE id='$cart_id';";

		$db->query($sql);

		header("Location: sell_products_list.php?singledelete2=success");
	}



	//Removing a all products from cart table
	if(isset($_GET['allproduct_delte']))
	{
		

		$sql = "DELETE FROM cart;";

		$db->query($sql);

		header("Location: cart.php?alldelete=success");
	}

	
	//code for ajax auto update in cart for product quantities
	
	if(isset($_POST['qty'])){
		$qty= $_POST['qty'];
		$pid =$_POST['pid'];
		$pprice= $_POST['pprice'];
		$p2price=$_POST['p2price'];

		$tprice = $qty*$pprice;
		$t2price= $qty*$p2price;

		$stmt = $db->prepare("update cart set quantity=?, selling_total_price=?, cost_total_price=? where id=?");

		$stmt-> bind_param("issi", $qty,$tprice,$t2price,$pid);
		$stmt-> execute();


	}




	//// Order Placement ///

	if(isset($_POST['action']) && isset($_POST['action'])== 'order'){
		$name = $_POST['name'];
		
		$phone =$_POST['phone'];
		$products =$_POST['products'];
		$grand_total =$_POST['grand_total'];
		$grand_total_costing=$_POST['grand_total_costing'];
		$address =$_POST['address'];
		$pmode = $_POST['pmode'];


		$data= '';

		$sql= $db->prepare("insert into orders (name,phone,address,pmode,products,amount_paid,amount_cost) values(?,?,?,?,?,?,?)");

		$sql->bind_param("sssssss", $name,$phone,$address,$pmode,$products,$grand_total,$grand_total_costing);

		$sql->execute();

			$data .= '<div class="text-center">
						<h1 class= "mt-2 text-danger">Thank You!</h1>
						<h5 class= "text-success">Your Order Placed Successfully</h5>
						<h6 class="bg-danger tact-light rounded p-2" style="color:white;">Items Purchased : '.$products.'</h6>

						<h6>Name : '.$name.'</h6>
						<h6>Phone : '.$phone.' </h6>
						<h6>Total Amount Paid : '.number_format($grand_total).' </h6>
						<h6>Payment Mode : '.$pmode.'</h6>

						<a href="sell_products_list.php" class="btn btn-primary btn-block">Continue Shopping</a>	
						<a href="index.php" class="btn btn-dark btn-block">Dashboard</a>
						<a href="makepdf.php" class="btn btn-success btn-block">Print</a>

					</div>';

			echo $data;

			after_order_placement($db);
			
			$sql= $db->prepare("delete from cart");
			$sql->execute();

		
	}



	function after_order_placement($db){
		$query= "select * from cart";
		$query = $db->prepare($query);
		$query->execute();
		$r=$query->get_result();

		$product_cd_qty = array();

		while ($rr = $r->fetch_assoc()) {

			$arr=$rr['product_code']."%-/-%".$rr['quantity'];
			array_push($product_cd_qty,$arr);
		}
		
		$data=$product_cd_qty;

		foreach ($data as $x) {
			$split=explode("%-/-%", $x);

			$product_code=$split[0];
			$product_quantity=$split[1];
			
			$sql="UPDATE products set quantity=quantity - '".$product_quantity."' where id like '".$product_code."';";
			$db->query($sql);		

		}

	}



?>