<?php
	

	require 'db_config.php';

	$order_list = fetch_all_data_usingPDO($pdo,"select * from orders");
	$product_list=fetch_all_data_usingPDO($pdo,"select * from products");
	$total_orders=fetch_all_data_usingDB($db,"select COUNT(*) from orders");
	$total_products=fetch_all_data_usingDB($db,"select COUNT(*) from products");
	$total_amounts=fetch_all_data_usingDB($db,"SELECT SUM(amount_cost) as 'expense', SUM(amount_paid) as 'selling', SUM(amount_paid - amount_cost) as 'profit' FROM `orders`");
	$products_in_CART = fetch_all_data_usingPDO($pdo,"select * from cart");
	
	$pdf_info=fetch_all_data_usingDB($db,"select * from orders ORDER BY id desc limit 1");


	
	$date = date('d-m-y');

	$today_date = date('Y-m-d');

	

	$total_today=fetch_all_data_usingDB($db,"SELECT SUM(amount_paid - amount_cost) as 'profit_today' FROM `orders` where date(order_date_time) = '$today_date';");

	$total_month=fetch_all_data_usingDB($db,"SELECT SUM(amount_paid - amount_cost) as 'profit_month' FROM `orders` where month(order_date_time) = month('$date');");

	$total_customer=fetch_all_data_usingDB($db,"SELECT COUNT(*) FROM `orders` where date(order_date_time)='$today_date';");



	function fetch_all_data_usingPDO($pdo,$sql)
	{
		
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$row = $statement->fetchAll();

		return $row;
	}



	 function fetch_all_data_usingDB($db,$sql){
			
			$result = mysqli_query($db,$sql);
		    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		    mysqli_free_result($result);
		    return $row;
	}



?>