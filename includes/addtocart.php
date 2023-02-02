<?php 
		include '../dbcon.php';
		$sql = "SELECT * FROM `food_details` WHERE `f_id`='$f_id'";
		$query = $con->query($sql);
		$row = $query->fetch_array();
		$prod_name = $row['food_name'];
		$prod_desc = $row['food_desc'];
		$prod_price = $row['food_price'];
		$sd_id = $row['sd_id'];
		$food_cat_id = $row['food_cat_id'];	

		$check = "SELECT * FROM `orderdetails` WHERE `f_id`='$f_id' AND `u_id`='$ur_id' AND `delivery_status`= 0 ";
		$cquery = $con->query($check);
	 $cnumrow = $cquery->num_rows;
		if ($cnumrow == 0) {
			  $qweqwe = "INSERT IGNORE INTO `orderdetails`(`prod_name`, `prod_price`, `prod_desc`, `f_id`, `sd_id`, `f_c_id`, `u_id`) VALUES ('$prod_name','$prod_price','$prod_desc','$f_id','$sd_id','$food_cat_id','$ur_id')";
	$qweqweqwe = $con->query($qweqwe);
			echo "ADDED TO CART";
		}else{
			echo "ALREADY EXIST IN CART";
		}


 ?>