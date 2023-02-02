<?php 
include '../dbcon.php';
if (isset($loginuser)) { 
	$today = date("Y-m-d");
	$sql = "SELECT * FROM `accounts` WHERE `username`='$username' AND `password`='$password'";
	$query = $con->query($sql);
	$row = $query->fetch_array();
	 $numrows = $query->num_rows;
	if ($numrows > 0) {
		if ($row['position'] == 4) {
			$_SESSION['userid'] = $row['u_id'];
				echo "1";
		}else{
			if ($row['status']>0) {
					$_SESSION['userid'] = $row['u_id'];
				echo "1";
				}else{
					echo "2";
				} 
		}
	}else{
		$rsql="SELECT * FROM `riders` WHERE `r_username`='$username' AND `r_password`='$password' ";
		$rquery = $con->query($rsql);
		$rrow = $rquery->fetch_array();
		$rnumrows = $rquery->num_rows;
		if ($rnumrows > 0) {
			$_SESSION['rrid'] = $rrow['r_id'];
			echo "1";
		}else{
			echo "0";
		}
	}
}
if (isset($logout)) {
	session_destroy();
	echo '<script> window.location.href="../"</script>';
}
if (isset($register)) {
	
	$sql = "SELECT * FROM `accounts` WHERE `username`='$username'";
	$checkusername  = $con->query($sql);
	$nrow1 = $checkusername->num_rows;
	$sql.=" AND `password`='$pass'";
	$query = $con->query($sql);
	$nrow = $query->num_rows;

	if ($nrow > 0) {
		echo '0';
	}else{
		$inuser ="INSERT IGNORE INTO `accounts`(`username`, `password`, `fname`, `mname`, `lname`, `position`,`contactnumber`,`e-address`,`status`) VALUES ('$username','$pass','$fname','$mname','$lname','$up','$cnum','$email',0)";
		$inquery = $con->query($inuser);
		$uu_id = $con->insert_id;
		if (isset($cname)) {

			$image=$_FILES["busper"]["tmp_name"];
		   	$images = $_FILES["busper"]["name"];
			$target_dir = "../images/";
			$target_file = $target_dir . basename($_FILES["busper"]["name"]);
			if (file_exists($target_file)) { }else{ move_uploaded_file($image,$target_file ); }


			$instab = "INSERT IGNORE INTO `stablishmentdetails`(`companyName`, `number_branches`, `contact_number`,`u_id`,`busperm`,`bus_id`,`sd_status`) VALUES ('$cname','$cbranch','$cnumber','$uu_id','$images','$buscat',0)";
			$insquery = $con->query($instab);
		}
		if (isset($tcname)) {
			$image=$_FILES["tbusper"]["tmp_name"];
		   	$images = $_FILES["tbusper"]["name"];
			$target_dir = "../images/";
			$target_file = $target_dir . basename($_FILES["tbusper"]["name"]);
			if (file_exists($target_file)) { }else{ move_uploaded_file($image,$target_file ); }

			$instab = "INSERT IGNORE INTO `agent`(`comp_name`, `u_id`, `contactnumber`, `es_email`, `es_business_permit`,`r_status`) VALUES ('$tcname','$uu_id','$tcnumber','$temail','$images',0)";
			$insquery = $con->query($instab);
		}


		if ($inquery) {
			echo "1";
		}
	}
}
if (isset($addnewproduct)) {

	$image=$_FILES["image"]["tmp_name"];
   	$images = $_FILES["image"]["name"];
	$target_dir = "../images/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	if (file_exists($target_file)) { }else{ move_uploaded_file($image,$target_file ); }
	
	$sql ="INSERT IGNORE INTO `food_details`(`image`, `food_name`, `food_desc`, `food_price`, `sd_id`, `food_cat_id`,`prodquan_id`,`food_status`) VALUES ('$images','$prodname','$proddesc','$prodprice','$stab[0]','$prodcat','$quantity',0)";
	$query = $con->query($sql);
	if ($query) {
		echo '1';
	}else{
		echo "0";
	}

}
if (isset($addnewproductroom)) {

	$image=$_FILES["image"]["tmp_name"];
   	$images = $_FILES["image"]["name"];
	$target_dir = "../images/rooms/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	if (file_exists($target_file)) { }else{ move_uploaded_file($image,$target_file ); }

	$sql ="INSERT IGNORE INTO `room_details`( `avail_id`, `cost_id`, `room_descrip`,`image`,`sd_id`,`room_name`,`room_number`,`rd_id`) 
				VALUES ('$roomavail','$cost_room','$room_descrip','$images','$stab[0]','$room_name','$room_number',0)";
	$query = $con->query($sql);
	if ($query) {
		echo '1';
	}else{
		echo "0";
	}

}
if (isset($addpackage)) {
	$packageDisc = mysqli_escape_string($con,$packageDisc);
	$sql ="INSERT IGNORE INTO `packagedetails` (`packTitle`,`packageDisc`,`pack_prize`,`u_id`,`bookType`) VALUES 
	('$packTitle','$packageDisc','$pack_prize','$user_id',1)";
	$query = $con->query($sql);
	$package_id = $con->insert_id;
	 $upath="../tourpackages/";
    //uploads is the name of file array that is being uploaded.
foreach ($_FILES['tourpackimg']['name'] as $key=>$file) {
    $target = $upath.$file;
    $path=substr($target,3);
    // echo $path; THIS CAN BE STORED DIRECTLY TO THE DATABASE
    move_uploaded_file($_FILES['tourpackimg']['tmp_name'][$key], $target)
    or die();
    $infilequery = $con->query("INSERT IGNORE INTO `packageimg`(`package_id`, `img`) VALUES ('$package_id','$file')");
	}
	if ($query) { echo '<script> window.location.href="../?t=addpackage&insert=success"</script>';}

}
if (isset($editprod)) {
	$image=$_FILES["image"]["tmp_name"];
   	$images = $_FILES["image"]["name"];
	$target_dir = "../images/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	if (file_exists($target_file)) { }else{ move_uploaded_file($image,$target_file ); }

	if (empty($images)) {
		 echo $sql = "UPDATE `food_details` SET `food_status`='$status',`food_name`='$prodname',`food_desc`='$proddesc',`food_price`='$prodprice',`food_cat_id`='$prodcat',`food_cat_id`='$prodcat',`prodquan_id`='$prodprice'  WHERE `f_id`='$f_id'";
		$query = $con->query($sql);
	}
	else{
		$sql = "UPDATE `food_details` SET `food_status`='$status',`image`='$images',`food_name`='$prodname',`food_desc`='$proddesc',`food_price`='$prodprice',`prodquan_id`='$prodprice' WHERE `f_id`='$f_id'";
		$query = $con->query($sql);

	}
	if ($query) {
		echo '<script> window.location.href="../?q=foods&insert=success"</script>';
	}
}
if (isset($editprodroom)) {
	$image=$_FILES["image"]["tmp_name"];
   	$images = $_FILES["image"]["name"];
	$target_dir = "../images/rooms/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	if (file_exists($target_file)) { }else{ move_uploaded_file($image,$target_file );}

	if (empty($images)) {
		 $sql = "UPDATE room_details SET rd_id='$status',room_descrip='$room_descrip',avail_id='$avail_id',cost_id='$cost_room',room_name='$room_name',room_number='$room_number' WHERE room_id='$room_id'";
		$query = $con->query($sql);
	}
	else{
		$sql = "UPDATE room_details SET rd_id='$status',image='$images',room_descrip='$room_descrip',avail_id='$avail_id',cost_id='$cost_room',room_name='$room_name',room_number='$room_number' WHERE room_id='$room_id'";
		$query = $con->query($sql);
	}
	if ($query) {
		echo '1';
	}else{
		echo "0";
	}
}
// if (isset($submitOrder)) {
// 		$amm = 0;
// 	foreach ($o_id as $key => $value) {
// 		$quantity = $qtty[$key];
// 		$ammount = $amount[$key];
// 		$amm = $amm +$ammount;

// 		$update  = "UPDATE `orderdetails` SET `qtty`='$quantity' WHERE `o_id`='$value' ";
// 		$uquery = $con->query($update);
// 	}
// 	// echo $amm;
// 	  $guserdata = "SELECT * FROM `accounts` WHERE `u_id`='$uid'";
// 	  $gudquery = $con->query($guserdata);
// 	  $gudrow = $gudquery->fetch_array();

// 	  $todate = date("Y-m-d");
// 	  $random_color = '-' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
// 	  $orderId = date("Y-m").$random_color;
// 	$updateOrder = "UPDATE `orderdetails` SET `delivery_status` = 1 , `delivery_date` = '$todate', `order_id`='$orderId', `delivery_address` = '$del_add',`b_id`='$barangay' WHERE `u_id`='$uid' AND `delivery_status` = 0 ";
// 	$uoquery = $con->query($updateOrder);
	
// 		header("location:https://getpaid.gcash.com/paynow?public_key=pk_2535a05555ebf394086d092469e4c826&amp;amount='100'&amp;fee=0&amp;expiry=6&amp;description=Payment for services rendered");
// 	if ($uoquery) {
			
// 	}
// }
	if (isset($forpickup)) {
		
		$update = "UPDATE `orderdetails` SET `delivery_status`= 2 WHERE `order_id`='$order_id' AND `sd_id`='$sd_id'";
		$uquery = $con->query($update);
		if ($uquery) {
			echo '<script> window.location.href="../?q=orders&insert=success"</script>';
		}
	}
	if (isset($delivered)) {
		$today = date("Y-m-d");
		 $update = "UPDATE `orderdetails` SET `delivery_status`= 3,`delivery_date`='$today' WHERE `order_id`='$order_id'";
		$uquery = $con->query($update);

		$message = "The order has been delivered successfully with order No.".$order_id;
		$ch = curl_init(); 
		 $parameters = array(
		          'apikey' => '2333c22cb66e930b71c0246618ca3776', 
		          'number' => '09063800777',
		          'message' => $message, 
		          'sendername' => 'INDINAGAT'
		          );
		curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

		$result = curl_exec($ch);
		print_r($result);
		if (curl_errno($ch)) {
		    $error_msg = curl_error($ch);
		    print_r($error_msg);
		}else{
		 // header('location:../../doh.pharma/?q=send_delivery&feedback=deliverySent');

		}
		curl_close($ch);

		if ($uquery) {
			echo '<script> window.location.href="../?q=deliverysuccess"</script>';
		}
	}
	if (isset($banner)) {

		$image=$_FILES["image"]["tmp_name"];
	   	$images = $_FILES["image"]["name"];
		$target_dir = "../images/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);	
		if (file_exists($target_file)) { }else{ move_uploaded_file($image,$target_file ); }

		if ($sd_id == 202020) {
		$sql = "UPDATE `agent` SET `comp_banner`='$images' WHERE `u_id`='$user_id'";
		$query = $con->query($sql);
		if ($query) {
			echo '<script> window.location.href="../"</script>';
		}
			}else{
		$sql = "UPDATE `stablishmentdetails` SET `stabbanner`='$images' WHERE `u_id`='$user_id'";
		$query = $con->query($sql);
		if ($query) {
			echo '<script> window.location.href="../?q=storeMenu&insert=success&sd_id='.$sd_id.'"</script>';
		}
			}
	}
	if (isset($updateLogo)) {

		$image=$_FILES["image"]["tmp_name"];
	   	$images = $_FILES["image"]["name"];
		$target_dir = "../images/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);	
		if (file_exists($target_file)) { }else{ move_uploaded_file($image,$target_file ); }

		if ($sd_id == 202020) {
		$sql = "UPDATE `agent` SET `comp_logo`='$images' WHERE `u_id`='$user_id'";
		$query = $con->query($sql);
		if ($query) {
			echo '<script> window.location.href="../"</script>';
		}
		}else{
		$sql = "UPDATE `stablishmentdetails` SET `companyLogo`='$images' WHERE `u_id`='$uid'";
		$query = $con->query($sql);
		if ($query) {
			echo '<script> window.location.href="../?q=storeMenu&insert=success&sd_id='.$sd_id.'"</script>';
		}
		}
	}
	// if (isset($updatesubs)) {
	// 	 $check = "SELECT * FROM `accounts` WHERE `u_id`='$uid'";
	// 	 $cquery = $con->query($check);
	// 	 $crow = $cquery->fetch_array();
	// 	 // $lastSub = $crow['valid_until'];

	// 	 // if ($lastSub >= $paymentdate) {
	// 	 // 	$s = $lastSub;
	// 	 // 	$newsub = date("Y-m-d", strtotime("+1 month". $lastSub));
	// 	 // }else{
	// 	 // 	echo $s = $paymentdate;
	// 	 // 	$newsub = date("Y-m-d", strtotime("+1 month". $paymentdate));
	// 	 // }
	// 	 // echo $newsub;
	// 	 $upacc = "UPDATE `accounts` SET `status`='1' WHERE `u_id`='$uid'";
	// 	 $upquery = $con->query($upacc);

	// 	 // $insert = "INSERT INTO `subscription_details`(`sub_start`, `sub_end`, `u_id`) VALUES ('$s','$newsub','$uid')";
	// 	 // $inquery = $con->query($insert);
	// 	 if ($upquery) {
	// 	 	echo '<script> window.location.href="../?q=users"</script>';
	// 	 }
	// }
	if (isset($newrider)) {
		
			$insert = "INSERT IGNORE INTO `riders`(`fname`, `mname`, `lname`, `contnum`, `address`,`r_status`,`r_username`,`r_password`) VALUES ('$fname','$mname','$lname','$contnum','$adres',0,'$usernamer','$passwordr')";
			$inquery= $con->query($insert);

				// SEMAPHORE START
				 $ch = curl_init(); 
				 $parameters = array(
				          'apikey' => '2333c22cb66e930b71c0246618ca3776', 
				          'number' => $contnum,
				          'message' => $lname.", ".$fname." You're application is approved. Use this Credentials to access the INSIDEDINAGAT RIDER platform. |Username:".$usernamer."|Password:".$passwordr."| Looking forward working with you.", 
				          'sendername' => 'INDINAGAT'
				          );
				curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
				curl_setopt( $ch, CURLOPT_POST, 1 );
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

				//Send the parameters set above with the request
				curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

				$result = curl_exec($ch);
				// print_r($result);
				if (curl_errno($ch)) {
				    $error_msg = curl_error($ch);
				    // print_r($error_msg);
				}else{
				 // header('location:../../doh.pharma/?q=send_delivery&feedback=deliverySent');

				}
				curl_close($ch);


			if ($inquery) {
				echo '<script> window.location.href="../?q=drivers&insert=success"</script>';
			}
	}	 
	if (isset($editrider)) {
		$update = "UPDATE `riders` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`contnum`='$contnum',`address`='$adres' WHERE `r_id`='$r_id'";
		$query = $con->query($update);
		if ($query) {
			echo '<script> window.location.href="../?q=drivers&update=success"</script>';
		}
	}
		if (isset($deleteRider)) {
		$update = "DELETE FROM `riders` WHERE `r_id`='$r_id'";
		$query = $con->query($update);
		if ($query) {
			echo '<script> window.location.href="../?q=drivers&delete=success"</script>';
		}
	}
	if (isset($setRider)) {
		 $update ="UPDATE `orderdetails` SET `d_id`='$r_id' WHERE `order_id`='$order_id'";
		$query = $con->query($update);
		$sql1  = "SELECT * FROM `orderdetails` WHERE `order_id`='$order_id' ";
		$query1 = $con->query($sql1);
		$row1 = $query1->fetch_array();
		$clientname = getUser($row1['u_id']);
		$rider = getRider($row1['d_id']);
		$riderCont = getRiderCont($row1['d_id']);

		$gtotal ="SELECT * FROM `orderdetails` WHERE `order_id`='$order_id'";
		$gtq = $con->query($gtotal);
		$grandtot = 0;
		$total =0;
		while ($gtr = $gtq->fetch_array()) {
			$additional = (5 / 100) * $gtr['prod_price'];
			$theprice = $gtr['prod_price'] + $additional;
			$total = $theprice * $gtr['qtty'];
			$grandtot = $grandtot + $total;
		}


		$message = $clientname." The food you ordered from INSIDEDINAGAT is out for delivery ";
		if (empty($row1['gcash_code'])) {
			$message .= " Please prepare ₱".$grandtot;
		}
		$message .= "You're rider is - ".$rider.' ( '.$riderCont.' ) ';
		$useridd = $row1['u_id'];
		$usern = "SELECT * FROM `accounts` WHERE `u_id`='$useridd'";
		$userq = $con->query($usern);
		$userr = $userq->fetch_array();
		$phone = $userr['contactnumber'];

		 $ch = curl_init(); 
		 $parameters = array(
		          'apikey' => '2333c22cb66e930b71c0246618ca3776', 
		          'number' => $phone,
		          'message' => $message, 
		          'sendername' => 'INDINAGAT'
		          );
		curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

		$result = curl_exec($ch);
		print_r($result);
		if (curl_errno($ch)) {
		    $error_msg = curl_error($ch);
		    print_r($error_msg);
		}else{
		 // header('location:../../doh.pharma/?q=send_delivery&feedback=deliverySent');

		}
		curl_close($ch);
		// if ($query) {
		//  	echo "1";
		// }else{
		// 	echo "0";
		// }
	}
	if (isset($gcashPaid)) {
		 $update ="UPDATE `orderdetails` SET `paymentGcash`=1 WHERE `order_id`='$order_id'";
		$query = $con->query($update);
		if ($query) {
			echo "1";
		}else{
			echo "1";
		}
	}
	
	if (isset($chckInNow)) {
		$intime = date("h:i:s");
		$sql = "UPDATE `booking` SET `status`=1,`inTime`='$intime' WHERE `booking_id`='$chckInNow'";
		$query = $con->query($sql);
		if ($query) {
			echo "1";	
		}else{
			echo "0";	
		}
	}
	if (isset($cancelReservation)) {
		$intime = date("h:i:s");
	    $sql = "UPDATE `booking` SET `status`=3 WHERE `booking_id`='$cancelReservation'";
		$query = $con->query($sql);
		if ($query) {
			echo "1";	
		}else{
			echo "0";	
		}
	}
	if (isset($extendBookingx)) {
		$check = "SELECT * FROM `booking` WHERE `booking_id`='$booking_idx'";
		$cquery = $con->query($check);
		$crow = $cquery->fetch_array();
		$checkoutdate =$crow['checkOut'];
		$extended = date("Y-m-d", strtotime($checkoutdate.'+ '.$numberofdays.' days'));

		$sql ="UPDATE `booking` SET `checkOut`='$extended' WHERE `booking_id`='$booking_idx'";
		$query = $con->query($sql);
		if ($query) {
			echo "1";
		}else{

			echo "0";
		}

	}
	if (isset($gcash_codeUpdate)) {
		$sql = "UPDATE `$table` SET `gcash_code`='$gcash_code' WHERE `$tcon`='$tid'";
		$query = $con->query($sql);
        // SEMAPHORE START
			// SEMAPHORE START
		  $message = "GOOD MORNING Mr./Mrs. ".$customername."Your Room Booking is reserved. Click here to pay  ".$thelink." thank you!";    
			 $ch = curl_init(); 
			 $parameters = array(
			          'apikey' => '2333c22cb66e930b71c0246618ca3776', 
			          'number' => $customermobile,
			          'message' => $message, 
			          'sendername' => 'INDINAGAT'
			          );
			curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
			curl_setopt( $ch, CURLOPT_POST, 1 );
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

			//Send the parameters set above with the request
			curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

			$result = curl_exec($ch);
			// print_r($result);
			if (curl_errno($ch)) {
			    $error_msg = curl_error($ch);
			    // print_r($error_msg);
			}else{
			 // header('location:../../doh.pharma/?q=send_delivery&feedback=deliverySent');

			}
			curl_close($ch);
			// END
		if ($query) {
			echo "1";	
		}else{
			echo "0";	
		}
	}
	if (isset($gcash_codeUpdate1)) {
		$todate =date("Y-m-d");
		$guserdata = "SELECT * FROM `accounts` WHERE `u_id`='$user_id'";
		  $gudquery = $con->query($guserdata);
		  $gudrow = $gudquery->fetch_array();
		  $fullname = $gudrow['lname'].', '.$gudrow['fname'];
		  $contact = $gudrow['contactnumber'];
		  $todate = date("Y-m-d");
		  $random_color = '-' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
		  $orderId = date("ymhs").$random_color;
		$sql = "UPDATE `$table` SET `gcash_code`='$gcash_code' ,`delivery_address` = '$purok', `delivery_date` = '$todate',`b_id`= '$b_id',`order_id`='$orderId', `delivery_status`=1  WHERE `$tcon`='$tid' AND `delivery_status`=0 ";
		$query = $con->query($sql);
		// SEMAPHORE START
		 $message = "GOOD MORNING Mr./Mrs. ".$customername."The food you ordered are being prepared. Click here to pay  ".$thelink." Thank you!";    
			 $ch = curl_init(); 
			 $parameters = array(
			          'apikey' => '2333c22cb66e930b71c0246618ca3776', 
			          'number' => $customermobile,
			          'message' => $message, 
			          'sendername' => 'INDINAGAT'
			          );
			curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
			curl_setopt( $ch, CURLOPT_POST, 1 );
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

			//Send the parameters set above with the request
			curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

			$result = curl_exec($ch);
			// print_r($result);
			if (curl_errno($ch)) {
			    $error_msg = curl_error($ch);
			    // print_r($error_msg);
			}else{
			 // header('location:../../doh.pharma/?q=send_delivery&feedback=deliverySent');

			}
			curl_close($ch);
			// END
		if ($query) {
			echo "1";	
		}else{
			echo "0";	
		}
	}
	if (isset($updateUserStatus)) {
		 $sql ="SELECT * FROM `accounts` WHERE `u_id`='$updateUserStatus' ";
		 $query = $con->query($sql);
		 $urd = $query->fetch_array();
		 if ($urd['status'] > 0) {
		 	$up = "UPDATE `accounts` SET `status`=0 WHERE `u_id`='$updateUserStatus'";
		 	$upq = $con->query($up);
		 }else{
		 	$up = "UPDATE `accounts` SET `status`=1 WHERE `u_id`='$updateUserStatus'";
		 	$upq = $con->query($up);
		 }
		 if ($upq) {
		 	echo "1";
		 }else{
		 	echo "0";
		 }
	}
	if (isset($editPackageData)) {
		$sql ="UPDATE `packagedetails` SET 
		`packTitle`='$packTitle',
		`packageDisc`='$packageDesc',
		`pack_prize`='$pack_prize',
		`user_packID`='$packstatus'
		WHERE `package_id`='$editPackageData' ";
		$query = $con->query($sql);
		if ($query) {
			echo "1";
		}else{
			echo "0";
		}
	}
	if (isset($gcash_codebooking)) {
		$sql = "UPDATE `booking` SET `paymentgcash_status`=1 WHERE `gcash_code`='$gcash_codebooking'";
		$query = $con->query($sql);
		if ($query) {
			echo "1";	
		}else{
			echo "0";	
		}
	}
	if (isset($gcash_codetour)) {
	 $sql = "UPDATE `package_booking` SET `paymentgcash_status`=1 WHERE `gcash_code`='$gcash_codetour'";
		$query = $con->query($sql);
		if ($query) {
			echo "1";	
		}else{
			echo "0";	
		}
	}
	if (isset($adddatetopackageX)) {
		$sql = "INSERT IGNORE INTO `package_sub`
		(`p_s_date`, `p_status`, `package_id`, `package_qtty`) VALUES 
		('$tour_date',0,'$package_id','$tour_pax')";
		$query = $con->query($sql);
		if ($query) {
			echo "1";	
		}else{
			echo "0";
		}
	}
	if (isset($bookthistour)) {
		$today = date("Y-m-d");
		$dateandtime = date("Y-m-d h:i:s");
		        $sql  = "SELECT * FROM `packagedetails` WHERE `package_id`='$package_id' ";
		        $query = $con->query($sql);
				$row = $query->fetch_array();
				$tourprice=$row['pack_prize'];
		$insert="INSERT IGNORE INTO `package_sub`
		(`p_s_date`, `package_id`, `package_qtty`, `u_id`) VALUES 
		('$tourdate','$package_id','$numpax','$user_id')";
		$inq = $con->query($insert);
		$pack_sub_id = $con->insert_id;

		$insert1 = "INSERT IGNORE INTO `package_booking`
		(`package_id`, `client_name`, `client_contact`, `gcash_code`, `paymentgcash_status`, `u_id`, `numpax`, `package_sub_id`,`tour_price_atm`,`bookdatetime`) VALUES 
		('$package_id','$customername','$customermobile','$gcash_code',0,'$user_id','$numpax','$pack_sub_id','$tourprice','$dateandtime')";
		$inq1 = $con->query($insert1);


			// SEMAPHORE START
		  $message = "GOOD MORNING Mr./Mrs. ".$customername."Your Tour Package Booking is Booked. Click here to pay  ".$thelink." thank you! failure to pay within 24 hours Booking will be canceled ";    
			 $ch = curl_init(); 
			 $parameters = array(
			          'apikey' => '2333c22cb66e930b71c0246618ca3776', 
			          'number' => $customermobile,
			          'message' => $message, 
			          'sendername' => 'INDINAGAT'
			          );
			curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
			curl_setopt( $ch, CURLOPT_POST, 1 );
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

			//Send the parameters set above with the request
			curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

			$result = curl_exec($ch);
			// print_r($result);
			if (curl_errno($ch)) {
			    $error_msg = curl_error($ch);
			    // print_r($error_msg);
			}else{
			 // header('location:../../doh.pharma/?q=send_delivery&feedback=deliverySent');

			}
			curl_close($ch);
			// END

		if ($inq1) {
			echo "1";
		}else{
			echo "0";
		}

	}
 ?>