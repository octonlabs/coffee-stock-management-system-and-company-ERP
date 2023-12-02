<?php

if (isset($_POST['add_coffee_grade'])) {
	// code...
if ($_SESSION['admin']=='1') {
	if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate
$coffeegrade=mysqli_real_escape_string($con,$_POST['coffeegrade']);
	$alertlevel=mysqli_real_escape_string($con,$_POST['alertlevel']);

$gt_cust = mysqli_query($con,"SELECT * FROM coffee_grades WHERE coffeegrade='$coffeegrade'");
$customer = mysqli_num_rows($gt_cust);
$cust_status = $customer;

if ($cust_status>0) {
	// code...
	$error="Coffee Grade Already Exists";
} else {
	// code...

if(!(empty($coffeegrade)) && !(empty($alertlevel)))
{



$new_grade = mysqli_query($con,"INSERT INTO coffee_grades(coffeegrade,alertlevel) VALUES('$coffeegrade','$alertlevel')");

if ($new_grade) {
	// code...
	$message="New Grade Added Successfully";
}
else
{
	$error="Database Uplink Failure!";
}

}
else
{
	$error="You Can't Submit Empty Data";
}

}

}
else
{
	$error="Access Denied!";
}
}
else
{

//not logged in
	echo "<script>window.location='logout.php'</script>";

}


}



?>