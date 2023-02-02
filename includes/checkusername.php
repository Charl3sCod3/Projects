<?php 
include '../dbcon.php';
$sql = "SELECT * FROM `accounts` WHERE `username`='$username'";
$query = $con->query($sql);
$numrow = $query->num_rows;
echo $numrow;
 ?> 