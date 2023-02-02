<?php 
include '../dbcon.php';
$sql = "SELECT * FROM `accounts` WHERE `username`='$username' AND `password`='$password'";
	$query = $con->query($sql);
	$nrow = $query->num_rows;
	if ($nrow > 0) {
				$row = $query->fetch_array();
					$number=$row['contactnumber'];
				 $ch = curl_init(); 	
				 $parameters = array(
				          'apikey' => '2333c22cb66e930b71c0246618ca3776', 
				          'number' => $number,
				          'message' => "INSIDE DINAGAT LOGIN OTP CODE:{otp}", 
				          'sendername' => 'INDINAGAT'
				          );
				curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/otp' );
				curl_setopt( $ch, CURLOPT_POST, 1 );
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
				$result = curl_exec($ch);
				print_r($result);
				if (curl_errno($ch)) {
				    $error_msg = curl_error($ch);
				    print_r($error_msg);
				}
				curl_close($ch);
	}else{
		$rsql="SELECT * FROM `riders` WHERE `r_username`='$username' AND `r_password`='$password' ";
		$rquery = $con->query($rsql);
		$rnumrows = $rquery->num_rows;
		if ($rnumrows > 0) {
			$rrow = $rquery->fetch_array();
				$number=$rrow['contnum'];
				 $ch = curl_init(); 	
				 $parameters = array(
				          'apikey' => '2333c22cb66e930b71c0246618ca3776', 
				          'number' => $number,
				          'message' => "INSIDE DINAGAT LOGIN OTP CODE:{otp}", 
				          'sendername' => 'INDINAGAT'
				          );
				curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/otp' );
				curl_setopt( $ch, CURLOPT_POST, 1 );
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
				$result = curl_exec($ch);
				print_r($result);
				if (curl_errno($ch)) {
				    $error_msg = curl_error($ch);
				    print_r($error_msg);
				}
				curl_close($ch);
		}
	}
 ?>