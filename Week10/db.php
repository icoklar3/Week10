<?php
require "index2.php" ;

$mode = $_GET["case_label"];
switch ($mode) {
	case 'insert':
		$date = date('Y-m-d',time());
		$sql = "insert into accounts (email, fname, lname,phone, birthday,
		gender,password) values ('iac77@njit.edu','Ilhan', 'C','973','$date','Male','123456');";
		$results = runQuery($sql);
		header("Location: index.php");
		break;
	case 'update':
		$fname = 'mjlee@njit.edu';
		$sql ="update accounts set password = '54321' where fname = '$fname' ";
		$results = runQuery($sql);
		header("Location: index.php");
		break;
	case 'delete':
		$fname = 'ml241q73@njit.edu';
		$sql ="delete from accounts where fname = '$fname' ";
		$results = runQuery($sql);
		header("Location: index.php");
		break;
	case 'down dir':
		header("Location: Week10/db.php");
		break;
	default:
		header("Location: errors.php");
		break;
}
?>